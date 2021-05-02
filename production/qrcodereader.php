<?php
if(isset($_POST['submit'])){
  $barcodedate = $_POST['qrcode'];
  echo "<div id='wrapper'>";
echo "<div id='container'><h1>";
echo $barcodedate;
echo "</h1>";
  echo "</div>";
echo "</div>";
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
  @import url(https://fonts.googleapis.com/css?family=Raleway:400,700,900,400italic,700italic,900italic);

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
}
  </style>
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/duotone.css" integrity="sha384-R3QzTxyukP03CMqKFe0ssp5wUvBPEyy9ZspCB+Y01fEjhMwcXixTyeot+S40+AjZ" crossorigin="anonymous"/>
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/fontawesome.css" integrity="sha384-eHoocPgXsiuZh+Yy6+7DsKAerLXyJmu2Hadh4QYyt+8v86geixVYwFqUvMU8X90l" crossorigin="anonymous"/>
  <body>
<form class="" method="post">
  <div class="col-md-6 col-sm-6  form-group has-feedback">
  											<input type="text" class="form-control has-feedback-left" name="qrcode" id="inputSuccess2" placeholder="Focus Before Scan">
  											<span class="fas fa-scanner form-control-feedback left" aria-hidden="true"></span>
  										</div>
<input type="submit" name="submit" value="Submit">
</form>
  </body>
</html>
