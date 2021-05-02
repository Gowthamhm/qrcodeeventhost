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

	<!-- Bootstrap -->
	<link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<!-- Font Awesome -->
	<link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<!-- NProgress -->
	<link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
	<!-- iCheck -->
	<link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	<!-- bootstrap-wysiwyg -->
	<link href="../vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
	<!-- Select2 -->
	<link href="../vendors/select2/dist/css/select2.min.css" rel="stylesheet">
	<!-- Switchery -->
	<link href="../vendors/switchery/dist/switchery.min.css" rel="stylesheet">
	<!-- starrr -->
	<link href="../vendors/starrr/dist/starrr.css" rel="stylesheet">
	<!-- bootstrap-daterangepicker -->
	<link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

	<!-- Custom Theme Style -->
	<link href="../build/css/custom.min.css" rel="stylesheet">
<!-- Font Awsome CDN -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css" integrity="sha384-wESLQ85D6gbsF459vf1CiZ2+rr+CsxRY0RpiF1tLlQpDnAgg6rwdsUF1+Ics2bni" crossorigin="anonymous">
  <body>
    <form class="form-label-left input_mask" method="post">
  										<div class="col-md-6 col-sm-6  form-group has-feedback">
  											<input type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="First Name">
  											<span class="fas fa-scanner form-control-feedback left" aria-hidden="true"></span>
  										</div>
                      <input type="submit" class="btn btn-success" name="submit" value="Submit">
                    </form>
  </body>

	<!-- jQuery -->
	<script src="../vendors/jquery/dist/jquery.min.js"></script>
	<!-- Bootstrap -->
	<script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
	<!-- FastClick -->
	<script src="../vendors/fastclick/lib/fastclick.js"></script>
	<!-- NProgress -->
	<script src="../vendors/nprogress/nprogress.js"></script>
	<!-- bootstrap-progressbar -->
	<script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
	<!-- iCheck -->
	<script src="../vendors/iCheck/icheck.min.js"></script>
	<!-- bootstrap-daterangepicker -->
	<script src="../vendors/moment/min/moment.min.js"></script>
	<script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
	<!-- bootstrap-wysiwyg -->
	<script src="../vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
	<script src="../vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
	<script src="../vendors/google-code-prettify/src/prettify.js"></script>
	<!-- jQuery Tags Input -->
	<script src="../vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
	<!-- Switchery -->
	<script src="../vendors/switchery/dist/switchery.min.js"></script>
	<!-- Select2 -->
	<script src="../vendors/select2/dist/js/select2.full.min.js"></script>
	<!-- Parsley -->
	<script src="../vendors/parsleyjs/dist/parsley.min.js"></script>
	<!-- Autosize -->
	<script src="../vendors/autosize/dist/autosize.min.js"></script>
	<!-- jQuery autocomplete -->
	<script src="../vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
	<!-- starrr -->
	<script src="../vendors/starrr/dist/starrr.js"></script>
	<!-- Custom Theme Scripts -->
	<script src="../build/js/custom.min.js"></script>
</html>
