<?php
include 'session.php';
include 'connection.php';
include 'error.php';

if (!empty($_SESSION['folder_name'])) {
  // echo $_SESSION['folder_name'];
} else {
?>
  <script type="text/javascript" charset="utf-8">
    window.location.replace('home.php');
  </script>
<?php
}
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

  <title>Share QrCode</title>
  <script src="ckeditor.js"></script>
  <script src="js/sample.js"></script>
  <link rel="stylesheet" href="css/samples.css">
  <link rel="stylesheet" href="samples/toolbarconfigurator/lib/codemirror/neo.css">
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
        <div class="">
          <div class="clearfix"></div>


    </div>
  </div>
  </div>
  <!-- /page content -->
  </div>
  </div>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
  <script type="text/javascript">
    $(function() {
      $("#sub").click(function() {
        //Create an Array.
        var selected = new Array();

        //Reference the CheckBoxes and insert the checked CheckBox value in Array.
        $("#datatable-checkbox input[type=checkbox]:checked").each(function() {
          selected.push(this.value);
        });
        //Display the selected CheckBox values.
        if (selected.length > 0) {
          document.getElementById('num').value = selected.join(",");
          // alert("Selected values: " + selected.join(","));
        }
      });
    });

    $(document).ready(function() {
      $('#check-all').click(function() {
        var isChecked = $(this).prop("checked");
        $('#datatable-checkbox tr:has(td)').find('input[type="checkbox"]').prop('checked', isChecked);
      });

      $('#datatable-checkbox tr:has(td)').find('input[type="checkbox"]').click(function() {
        var isChecked = $(this).prop("checked");
        var isHeaderChecked = $("#check-all").prop("checked");
        if (isChecked == false && isHeaderChecked)
          $("#check-all").prop('checked', isChecked);
        else {
          $('#datatable-checkbox tr:has(td)').find('input[type="checkbox"]').each(function() {
            if ($(this).prop("checked") == false)
              isChecked = false;
          });
          console.log(isChecked);
          $("#check-all").prop('checked', isChecked);
        }
      });
    });
  </script>
  <script type="text/javascript">
    initSample();
    CKEDITOR.replace('editor1');

    function showeditor() {
      var x = document.getElementById("collapseOne");
      if (x.style.display === "none") {
        x.style.display = "block";
      } else {
        x.style.display = "none";
      }
    }

    function submitForm() {
      // $("#hiddentext").val($("").html());
      var data = CKEDITOR.instances.editor1.getData();
      console.log(data);
      document.getElementById("hiddentext").value = data;
      document.getElementById("qrsubmit").submit();
      // document.getElementById("qrsubmit").submit();
    }
  </script>
  <!-- jQuery -->
  <script src="../vendors/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!-- FastClick -->
  <script src="../vendors/fastclick/lib/fastclick.js"></script>
  <!-- NProgress -->
  <script src="../vendors/nprogress/nprogress.js"></script>
  <!-- iCheck -->
  <script src="../vendors/iCheck/icheck.min.js"></script>
  <!-- Datatables -->
  <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
  <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
  <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
  <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
  <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
  <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
  <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
  <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
  <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
  <script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
  <script src="../vendors/jszip/dist/jszip.min.js"></script>
  <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
  <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>

  <!-- Custom Theme Scripts -->
  <script src="../build/js/custom.min.js"></script>

</body>

</html>
