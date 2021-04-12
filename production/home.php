<?php
include 'session.php';
include 'config.php';
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

    <title>Home</title>
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
    <link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
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
                <h2><?php echo $_SESSION['active_user'];?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
                  <li><a href="home.php" ><i class="fa fa-home"></i> Home </a>
                  </li>
                  <li><a href="instancesms.php"><i class="fa fa-comments-o"></i> Instance SMS </a>
                  </li>
                  <li><a href="spreadsheet.php"><i class="fa fa-file-excel-o"></i> Google Sheets</a>
                  </li>
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
                  <a class="dropdown-item"  href="logout.php"><i class="fa fa-sign-out"></i> Log Out</a>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
          <div class="row">
          <div class="col-md-12">
            <div class="x_panel">
              <div class="x_title">
                <h2>Transaction Summary <small>Weekly progress</small></h2>
                <div class="filter">
                  <div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                    <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                    <span>December 30, 2014 - January 28, 2015</span> <b class="caret"></b>
                  </div>
                </div>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <div class="col-md-9 col-sm-12 ">
                  <div class="demo-container" style="height:280px">
                    <div id="chart_plot_02" class="demo-placeholder"></div>
                  </div>
                  <div class="tiles">
                    <div class="col-md-4 tile">
                      <span>Total Sessions</span>
                      <h2>231,809</h2>
                      <span class="sparkline11 graph" style="height: 160px;">
                           <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                      </span>
                    </div>
                    <div class="col-md-4 tile">
                      <span>Total Revenue</span>
                      <h2>$231,809</h2>
                      <span class="sparkline22 graph" style="height: 160px;">
                            <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                      </span>
                    </div>
                    <div class="col-md-4 tile">
                      <span>Total Sessions</span>
                      <h2>231,809</h2>
                      <span class="sparkline11 graph" style="height: 160px;">
                             <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                      </span>
                    </div>
                  </div>

                </div>

                <div class="col-md-3 col-sm-12 ">
                  <div>
                    <div class="x_title">
                      <h2>Top Profiles</h2>
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
                    <ul class="list-unstyled top_profiles scroll-view">
                      <li class="media event">
                        <a class="pull-left border-aero profile_thumb">
                          <i class="fa fa-user aero"></i>
                        </a>
                        <div class="media-body">
                          <a class="title" href="#">Ms. Mary Jane</a>
                          <p><strong>$2300. </strong> Agent Avarage Sales </p>
                          <p> <small>12 Sales Today</small>
                          </p>
                        </div>
                      </li>
                      <li class="media event">
                        <a class="pull-left border-green profile_thumb">
                          <i class="fa fa-user green"></i>
                        </a>
                        <div class="media-body">
                          <a class="title" href="#">Ms. Mary Jane</a>
                          <p><strong>$2300. </strong> Agent Avarage Sales </p>
                          <p> <small>12 Sales Today</small>
                          </p>
                        </div>
                      </li>
                      <li class="media event">
                        <a class="pull-left border-blue profile_thumb">
                          <i class="fa fa-user blue"></i>
                        </a>
                        <div class="media-body">
                          <a class="title" href="#">Ms. Mary Jane</a>
                          <p><strong>$2300. </strong> Agent Avarage Sales </p>
                          <p> <small>12 Sales Today</small>
                          </p>
                        </div>
                      </li>
                      <li class="media event">
                        <a class="pull-left border-aero profile_thumb">
                          <i class="fa fa-user aero"></i>
                        </a>
                        <div class="media-body">
                          <a class="title" href="#">Ms. Mary Jane</a>
                          <p><strong>$2300. </strong> Agent Avarage Sales </p>
                          <p> <small>12 Sales Today</small>
                          </p>
                        </div>
                      </li>
                      <li class="media event">
                        <a class="pull-left border-green profile_thumb">
                          <i class="fa fa-user green"></i>
                        </a>
                        <div class="media-body">
                          <a class="title" href="#">Ms. Mary Jane</a>
                          <p><strong>$2300. </strong> Agent Avarage Sales </p>
                          <p> <small>12 Sales Today</small>
                          </p>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
          <!-- /top tiles -->
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
</html>
