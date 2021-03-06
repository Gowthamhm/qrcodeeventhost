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

  <title>Home</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
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
<style>
  .GFG {
    color: white;
    display: Inline-block;
    /* margin: 50px; */
    transform: scale(-1, 1);
    /* color: #000080; */
    -moz-transform: scale(-1, 1);
    -webkit-transform: scale(-1, 1);
    -o-transform: scale(-1, 1);
    -ms-transform: scale(-1, 1);
    transform: scale(-1, 1);
  }
</style>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <h4 class="card-title" style="text-align: center;"></h4>
            <a href="home.php" class="site_title" style="font-size: 18px;"><img src="images/logo.jpg" width="40px" height="40px" style="	border-radius: 50%;">SCRE<span class="GFG">E</span>N EVENTS</a>
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
                <?php if (empty($_SESSION['folder_name'])) {
                  // code...
                } else { ?>
                  <li><a href="sendQrcode.php"><i class="fa fa-share-alt"></i> Share QrCode </a>
                  </li>
                <?php
                }
                ?>
                <li><a href="qrcodereader.php"><i class="fas fa-scanner"></i> Scan QrCode </a>
                </li>
                <?php
                if ($_SESSION['role'] == 'admin') {
                ?>
                  <li><a href="addUser.php"><i class="fa fa-users"></i> ADD Users </a>
                  </li>
                  <li><a href="feedbacklist.php"><i class="fas fa-comments"></i> Feed Back </a>
                  </li>
                  <li><a href="scannedby.php"><i class="fas fa-scanner"></i>Scanned Info</a>
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
        <!-- top tiles -->
        <div class="row">
          <div class="col-md-12">
            <button class="btn btn-round btn-success clf" data-toggle="collapse" data-target="#collapseOne" onclick="showf()">
              <i class="fa fa-folder-o pr-2" aria-hidden="true"></i> Create Folder &nbsp;<i class="fa fa-plus"></i></button>
            <div class="collapse" id="collapseOne" style="display:none;">
              <!--Panel-->
              <div class="card card-body ml-1" style="background: none;width:fit-content;">
                <h4 class="card-title">Create Folder</h4>
                <form action="folderCreation.php" method="post">
                  <div class="form-group row">
                    <label for="inputPassword" class="col-sm-10 col-form-label">Folder Name</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="folder" placeholder="Enter Folder Name" required="true">
                      <input type="hidden" class="form-control" name="username" value="<?php echo $_SESSION['active_user'] ?>">
                    </div>
                  </div>
                  <div class="flex-row">
                    <input type="submit" class="btn btn-success cre" value="Create" name="create">
                  </div>
                </form>
              </div>

            </div>
            <!-- /col-md-12 end -->
          </div>
          <!-- /row end -->
        </div>
        <div class="row">
          <?php
          $sql = "SELECT * FROM `folders`";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
          ?> <div class="col-md-6 col-lg-4">
                <form method="post" action="folder.php" class="btn btn-default fol">
                  <input type="hidden" name="foldername" value="<?php echo $row['folder_name']; ?>">
                  <i class="fa fa-folder-open btn btn-round btn-primary">
                    <input type="submit" class="btn btn-primary inp" name="view" value="<?php echo $row['folder_name']; ?>"></i>
                </form>
              </div>
          <?php
            }
          }
          ?>
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