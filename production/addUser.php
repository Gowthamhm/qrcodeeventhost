<?php
include 'session.php';
include 'connection.php';
include 'error.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="images/logo.ico" type="image/ico" />

  <title>Add Users</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <!-- Bootstrap -->
  <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- iCheck -->
  <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">

  <!-- bootstrap-progressbar -->
  <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
  <!-- JQVMap -->
  <link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet" />
  <!-- bootstrap-daterangepicker -->
  <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="../build/css/custom.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/duotone.css" integrity="sha384-R3QzTxyukP03CMqKFe0ssp5wUvBPEyy9ZspCB+Y01fEjhMwcXixTyeot+S40+AjZ" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/fontawesome.css" integrity="sha384-eHoocPgXsiuZh+Yy6+7DsKAerLXyJmu2Hadh4QYyt+8v86geixVYwFqUvMU8X90l" crossorigin="anonymous" />
</head>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="home.php" class="site_title"><img src="images/logo.jpg" width="40px" height="40px" style="	border-radius: 50%;"> <span>Company Name</span></a>
          </div>

          <div class="clearfix"></div>

          <!-- menu profile quick info -->
          <div class="profile clearfix">
            <div class="profile_info">
              <span>Welcome,</span>
              <h2><?php echo $_SESSION['active_user']; ?></h2>
            </div>
          </div>
          <!-- /menu profile quick info -->

          <br />

          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
              <ul class="nav side-menu">
                <li><a href="home.php"><i class="fa fa-home"></i> Home </a>
                </li>
                <li><a href="instancesms.php"><i class="fa fa-comments-o"></i> Instance SMS </a>
                </li>
                <li><a href="spreadsheet.php?export=true"><i class="fa fa-file-excel-o"></i> Google Sheets</a>
                </li>
                  <li><a href="sendQrcode.php"><i class="fa fa-comments-o"></i> Share QrCode </a>
                  </li>
                <li><a href="qrcodereader.php"><i class="fas fa-scanner"></i> Scan QrCode </a>
                </li>
                <?php
                // echo $_SESSION['role'];
                if($_SESSION['role'] == 'admin'){
                  ?>
                  <li><a href="addUser.php"><i class="fa fa-users"></i> ADD Users </a>
                  </li>
                  <?php
                }
                ?>
              </ul>
            </div>
          </div>
          <!-- /sidebar menu -->
        </div>
      </div>
      <!-- top navigation -->
      <div class="top_nav">
        <div class="nav_menu">
          <div class="nav toggle">
            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
          </div>
          <nav class="nav navbar-nav">
            <ul class=" navbar-right">
              <li class="nav-item open" style="padding-left: 15px;">
                <a class="dropdown-item" href="logout.php"><i class="fa fa-sign-out"></i> Log Out</a>
              </li>
            </ul>
          </nav>
        </div>
      </div>
      <!-- /top navigation -->

      <!-- page content -->
      <div class="right_col" role="main">
      <div class="row">
          <div class="col-md-6 ">
            <div class="x_panel">
              <div class="x_title">
                <h2>Form Design <small>different form elements</small></h2>
                <ul class="nav navbar-right panel_toolbox">
                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                  </li>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      <a class="dropdown-item" href="#">Settings 1</a>
                      <a class="dropdown-item" href="#">Settings 2</a>
                    </div>
                  </li>
                  <li><a class="close-link"><i class="fa fa-close"></i></a>
                  </li>
                </ul>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <br />
                <form class="form-label-left input_mask">

                  <div class="col-md-6 col-sm-6  form-group has-feedback">
                    <input type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="First Name">
                    <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                  </div>

                  <div class="col-md-6 col-sm-6  form-group has-feedback">
                    <input type="text" class="form-control" id="inputSuccess3" placeholder="Last Name">
                    <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                  </div>

                  <div class="col-md-6 col-sm-6  form-group has-feedback">
                    <input type="email" class="form-control has-feedback-left" id="inputSuccess4" placeholder="Email">
                    <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                  </div>

                  <div class="col-md-6 col-sm-6  form-group has-feedback">
                    <input type="tel" class="form-control" id="inputSuccess5" placeholder="Phone">
                    <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
                  </div>

                  <div class="form-group row">
                    <label class="col-form-label col-md-3 col-sm-3 ">Default Input</label>
                    <div class="col-md-9 col-sm-9 ">
                      <input type="text" class="form-control" placeholder="Default Input">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-form-label col-md-3 col-sm-3 ">Disabled Input </label>
                    <div class="col-md-9 col-sm-9 ">
                      <input type="text" class="form-control" disabled="disabled" placeholder="Disabled Input">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-form-label col-md-3 col-sm-3 ">Read-Only Input</label>
                    <div class="col-md-9 col-sm-9 ">
                      <input type="text" class="form-control" readonly="readonly" placeholder="Read-Only Input">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-form-label col-md-3 col-sm-3 ">Date Of Birth <span class="required">*</span>
                    </label>
                    <div class="col-md-9 col-sm-9 ">
                      <input class="date-picker form-control" placeholder="dd-mm-yyyy" type="text" required="required" type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
                      <script>
                        function timeFunctionLong(input) {
                          setTimeout(function() {
                            input.type = 'text';
                          }, 60000);
                        }
                      </script>
                    </div>
                  </div>
                  <div class="ln_solid"></div>
                  <div class="form-group row">
                    <div class="col-md-9 col-sm-9  offset-md-3">
                      <button type="button" class="btn btn-primary">Cancel</button>
                      <button class="btn btn-primary" type="reset">Reset</button>
                      <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                  </div>

                </form>
              </div>
            </div>
      <!-- /page content -->
    </div>
  </div>

  <!-- jQuery -->
  <script src="../vendors/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!-- FastClick -->
  <script src="../vendors/fastclick/lib/fastclick.js"></script>
  <!-- NProgress -->
  <script src="../vendors/nprogress/nprogress.js"></script>
  <!-- Chart.js -->
  <script src="../vendors/Chart.js/dist/Chart.min.js"></script>
  <!-- gauge.js -->
  <script src="../vendors/gauge.js/dist/gauge.min.js"></script>
  <!-- bootstrap-progressbar -->
  <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
  <!-- iCheck -->
  <script src="../vendors/iCheck/icheck.min.js"></script>
  <!-- Skycons -->
  <script src="../vendors/skycons/skycons.js"></script>
  <!-- Flot -->
  <script src="../vendors/Flot/jquery.flot.js"></script>
  <script src="../vendors/Flot/jquery.flot.pie.js"></script>
  <script src="../vendors/Flot/jquery.flot.time.js"></script>
  <script src="../vendors/Flot/jquery.flot.stack.js"></script>
  <script src="../vendors/Flot/jquery.flot.resize.js"></script>
  <!-- Flot plugins -->
  <script src="../vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
  <script src="../vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
  <script src="../vendors/flot.curvedlines/curvedLines.js"></script>
  <!-- DateJS -->
  <script src="../vendors/DateJS/build/date.js"></script>
  <!-- JQVMap -->
  <script src="../vendors/jqvmap/dist/jquery.vmap.js"></script>
  <script src="../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
  <script src="../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
  <!-- bootstrap-daterangepicker -->
  <script src="../vendors/moment/min/moment.min.js"></script>
  <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

  <!-- Custom Theme Scripts -->
  <script src="../build/js/custom.min.js"></script>

</body>
<script type="text/javascript" charset="utf-8">
  function showf() {
    var x = document.getElementById("collapseOne");
    if (x.style.display === "none") {
      x.style.display = "block";
    } else {
      x.style.display = "none";
    }
  }
</script>

</html>
