<?php
if(isset($_POST['submit'])){
  $barcodedate = $_POST['qrcode'];
//   echo "<div id='wrapper'>";
// echo "<div id='container'><h1>";
// echo $barcodedate;
// echo "</h1>";
//   echo "</div>";
// echo "</div>";
echo "<canvas id='canvas'></canvas>";
echo "<h2>$barcodedate</h2>";
}else {

}
?>
<!doctype html>
<html lang="en">
  <head>
    <title></title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  </head>
  <style media="screen">
  /* @import url(https://fonts.googleapis.com/css?family=Raleway:400,700,900,400italic,700italic,900italic);

*,
:before,
:after {
  box-sizing: border-box;
}

body {
  background-color: #fdf9fd;
  color: #011a32;
  font: 16px/1.25 'Raleway', sans-serif;
  text-align: center;
}

#wrapper {
  margin-left: auto;
  margin-right: auto;
  max-width: 80em;
}

#container {
  display: flex;
  flex-direction: column;
  float: left;
  justify-content: center;
  min-height: 100vh;
  padding: 1em;
  width: 100%;
}

h1 {
  animation: text-shadow 1.5s ease-in-out infinite;
  font-size: 5em;
  font-weight: 900;
  line-height: 1;
}

h1:hover {
  animation-play-state: paused;
}

a {
  color: #024794;
}

a:hover {
  text-decoration: none;
}

@keyframes text-shadow {
  0% {
      transform: translateY(0);
      text-shadow:
          0 0 0 #0c2ffb,
          0 0 0 #2cfcfd,
          0 0 0 #fb203b,
          0 0 0 #fefc4b;
  }

  20% {
      transform: translateY(-1em);
      text-shadow:
          0 0.125em 0 #0c2ffb,
          0 0.25em 0 #2cfcfd,
          0 -0.125em 0 #fb203b,
          0 -0.25em 0 #fefc4b;
  }

  40% {
      transform: translateY(0.5em);
      text-shadow:
          0 -0.0625em 0 #0c2ffb,
          0 -0.125em 0 #2cfcfd,
          0 0.0625em 0 #fb203b,
          0 0.125em 0 #fefc4b;
  }

 60% {
      transform: translateY(-0.25em);
      text-shadow:
          0 0.03125em 0 #0c2ffb,
          0 0.0625em 0 #2cfcfd,
          0 -0.03125em 0 #fb203b,
          0 -0.0625em 0 #fefc4b;
  }

  80% {
      transform: translateY(0);
      text-shadow:
          0 0 0 #0c2ffb,
          0 0 0 #2cfcfd,
          0 0 0 #fb203b,
          0 0 0 #fefc4b;
  }
}

@media (prefers-reduced-motion: reduce) {
  * {
    animation: none !important;
    transition: none !important;
  }
} */
body, html {
  margin: 0;
  background: -webkit-radial-gradient(center, ellipse cover, #111 10%, #333 90%);
}

canvas {
  display: block;
  cursor: crosshair;
}

h2 {
  position: absolute;
  bottom: 10px;
  width: 100%;
  letter-spacing: 4px;
  text-align: center;
  font-weight: bold;
  font-size: 1em;
  font-family: Arial, Helvetica, sans-serif;
  color: #AAA;
}
  </style>
  <body>

<form class="" method="post">
<input type="text" name="qrcode" value="">
<input type="submit" name="submit" value="Submit">
</form>
  </body>
  <script type="text/javascript">
  /*
Johan Karlsson (DonKarlssonSan) 2018

Using my vector lib stored as a separate Pen:
https://codepen.io/DonKarlssonSan/pen/JreEJO

Also available at GitHub:
https://github.com/DonKarlssonSan/vectory

and npm:
https://www.npmjs.com/package/vectory-lib
*/

const config = {
text: "Repellers",
widthToSpikeLengthRatio: 0.054
};

const colorConfig = {
particleOpacity: 0.2,
baseHue: 350,
hueRange: 9,
hueSpeed: 0.04,
colorSaturation: 100,
};

class Planet {
constructor(x, y, g) {
  this.pos = new Vector(x, y);
  this.g = g;
}

draw() {
  ctx.fillStyle = "#AAA";
  ctx.beginPath();
  ctx.arc(this.pos.x, this.pos.y, 8, 0, Math.PI * 2);
  ctx.fill();
}
}

// A line that is part of forming the text
class Particle {
constructor(x, y) {
  this.pos = new Vector(x, y);
  this.vel = new Vector(0, spikeLength);
}

move(force) {
  if(force) {
    this.vel.addTo(force);
  }
  if(this.vel.getLength() > spikeLength) {
    this.vel.setLength(spikeLength);
  }
}

draw() {
  ctx.beginPath();
  ctx.moveTo(this.pos.x, this.pos.y);
  let p2 = this.pos.add(this.vel);
  ctx.lineTo(p2.x, p2.y);
  ctx.stroke();
}
}

let canvas;
let ctx;
let w, h;
let hue;
let particles;
let spikeLength;
let planets;
let A;
let B;
let a;
let b;
let tick;

function setup() {
tick = 0;
planets = [];
let len = Math.round(Math.random() * 3 + 3);
for(let i = 0; i < len; i++) {
  let p = new Planet(50 + i * 100, 340, i ? 1000 : 4000);
  planets.push(p);
}
canvas = document.querySelector("#canvas");
ctx = canvas.getContext("2d");
window.addEventListener("resize", reset);
canvas.addEventListener("mousemove", mousemove);
reset();
}

function reset() {
hue = colorConfig.baseHue;
w = canvas.width = window.innerWidth;
h = canvas.height = window.innerHeight;
spikeLength = w * config.widthToSpikeLengthRatio;
A = w / 2.2;
B = h / 2.2;
a = Math.round(Math.random() + 2);
b = Math.round(Math.random() + 2);
drawText();
}

function mousemove(event) {
let x = event.clientX;
let y = event.clientY;
planets[0].pos.x = x;
planets[0].pos.y = y;
}

function draw(now) {
clear();
requestAnimationFrame(draw);
updateParticles();
updatePlanets();
tick = now / 50;
}

function clear() {
ctx.clearRect(0, 0, w, h);
}

function drawText() {
ctx.save();
let fontSize = w * 0.2;
ctx.font = "bold " + fontSize + "px Arial, Helvetica, sans-serif";
ctx.textAlign = "center";
ctx.textBaseline = "middle"
ctx.lineWidth = 1;
ctx.strokeStyle = "white";
ctx.strokeText(config.text, w/2, h/2);
ctx.restore();
let imageData = ctx.getImageData(0, 0, w, h);

particles = [];

for(let x = 0; x < w; x++) {
  for(let y = 0; y < h; y++) {
    let i = (x + w*y)*4;
    let average = (imageData.data[i] +
                   imageData.data[i + 1] +
                   imageData.data[i + 2] +
                   imageData.data[i + 3]) / 4;
    if(average > 200) {
      let particle = new Particle(x, y);
      particles.push(particle);
    }
  }
}
clear();
}

function updatePlanets() {
let len = planets.length;
for(let i = 1; i < len; i++) {
  let angle = Math.PI * 2 / (len - 1) * i;
  let x = A * Math.sin(a * tick / 100 + angle) + w/2;
  let y = B * Math.sin(b * tick / 100 + angle) + h/2;
  let p = planets[i];
  p.pos.x = x;
  p.pos.y = y;
  p.draw();
}
}

function updateParticles() {
hue += colorConfig.hueSpeed;
let h = Math.sin(hue) * colorConfig.hueRange + colorConfig.baseHue;
ctx.strokeStyle = `hsla(${h}, ${colorConfig.colorSaturation}%, 50%, ${colorConfig.particleOpacity})`;
particles.forEach(p => {
  // Apply the force of each planet (repeller) to the current particle
  planets.forEach(planet => {
    let d = p.pos.sub(planet.pos);
    let length = d.getLength();
    let g = planet.g / length;
    if(g > 40) {
      g = 40;
    }
    // We keep the angle of the distance
    d.setLength(g);
    p.move(d);
  });
  p.draw();
});
}

setup();
draw(1);
  </script>
  <script src="https://codepen.io/DonKarlssonSan/pen/JreEJO" type="text/javascript" charset="utf-8"></script>
</html>
