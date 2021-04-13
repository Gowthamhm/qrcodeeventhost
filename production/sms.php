<?php
if(isset($_POST['send'])){
  echo $_POST['number'];
  echo $_POST['checkall'];
}
else{
    echo $_POST['checkall'];
  echo $_POST['number'];
}
?>
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

    <title>Message</title>
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
                  <li><a href="spreadsheet.php?export=true"><i class="fa fa-file-excel-o"></i> Google Sheets</a>
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
  				<div class="">
  					<div class="clearfix"></div>
  					<div class="col-md-12 col-sm-12 ">
  						<div class="x_panel">
  							<div class="x_title">
  								<h2>Text areas<small>Sessions</small></h2>
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
  								<div id="alerts"></div>
  								<div class="btn-toolbar editor" data-role="editor-toolbar" data-target="#editor-one">
  									<div class="btn-group">
  										<a class="btn dropdown-toggle" data-toggle="dropdown" title="Font"><i class="fa fa-font"></i><b class="caret"></b></a>
  										<ul class="dropdown-menu">
  										</ul>
  									</div>

  									<div class="btn-group">
  										<a class="btn dropdown-toggle" data-toggle="dropdown" title="Font Size"><i class="fa fa-text-height"></i>&nbsp;<b class="caret"></b></a>
  										<ul class="dropdown-menu">
  											<li>
  												<a data-edit="fontSize 5">
  													<p style="font-size:17px">Huge</p>
  												</a>
  											</li>
  											<li>
  												<a data-edit="fontSize 3">
  													<p style="font-size:14px">Normal</p>
  												</a>
  											</li>
  											<li>
  												<a data-edit="fontSize 1">
  													<p style="font-size:11px">Small</p>
  												</a>
  											</li>
  										</ul>
  									</div>

  									<div class="btn-group">
  										<a class="btn" data-edit="bold" title="Bold (Ctrl/Cmd+B)"><i class="fa fa-bold"></i></a>
  										<a class="btn" data-edit="italic" title="Italic (Ctrl/Cmd+I)"><i class="fa fa-italic"></i></a>
  										<a class="btn" data-edit="strikethrough" title="Strikethrough"><i class="fa fa-strikethrough"></i></a>
  										<a class="btn" data-edit="underline" title="Underline (Ctrl/Cmd+U)"><i class="fa fa-underline"></i></a>
  									</div>

  									<div class="btn-group">
  										<a class="btn" data-edit="insertunorderedlist" title="Bullet list"><i class="fa fa-list-ul"></i></a>
  										<a class="btn" data-edit="insertorderedlist" title="Number list"><i class="fa fa-list-ol"></i></a>
  										<a class="btn" data-edit="outdent" title="Reduce indent (Shift+Tab)"><i class="fa fa-dedent"></i></a>
  										<a class="btn" data-edit="indent" title="Indent (Tab)"><i class="fa fa-indent"></i></a>
  									</div>

  									<div class="btn-group">
  										<a class="btn" data-edit="justifyleft" title="Align Left (Ctrl/Cmd+L)"><i class="fa fa-align-left"></i></a>
  										<a class="btn" data-edit="justifycenter" title="Center (Ctrl/Cmd+E)"><i class="fa fa-align-center"></i></a>
  										<a class="btn" data-edit="justifyright" title="Align Right (Ctrl/Cmd+R)"><i class="fa fa-align-right"></i></a>
  										<a class="btn" data-edit="justifyfull" title="Justify (Ctrl/Cmd+J)"><i class="fa fa-align-justify"></i></a>
  									</div>

  									<div class="btn-group">
  										<a class="btn dropdown-toggle" data-toggle="dropdown" title="Hyperlink"><i class="fa fa-link"></i></a>
  										<div class="dropdown-menu input-append">
  											<input class="span2" placeholder="URL" type="text" data-edit="createLink" />
  											<button class="btn" type="button">Add</button>
  										</div>
  										<a class="btn" data-edit="unlink" title="Remove Hyperlink"><i class="fa fa-cut"></i></a>
  									</div>

  									<div class="btn-group">
  										<a class="btn" title="Insert picture (or just drag & drop)" id="pictureBtn"><i class="fa fa-picture-o"></i></a>
  										<input type="file" data-role="magic-overlay" data-target="#pictureBtn" data-edit="insertImage" />
  									</div>

  									<div class="btn-group">
  										<a class="btn" data-edit="undo" title="Undo (Ctrl/Cmd+Z)"><i class="fa fa-undo"></i></a>
  										<a class="btn" data-edit="redo" title="Redo (Ctrl/Cmd+Y)"><i class="fa fa-repeat"></i></a>
  									</div>
  								</div>

  								<div id="editor-one" class="editor-wrapper"></div>

  								<textarea name="descr" id="descr" style="display:none;"></textarea>

  								<br />

  								<div class="ln_solid"></div>

  								<div class="form-group">
  									<label class="control-label col-md-3 col-sm-3 ">Resizable Text area</label>
  									<div class="col-md-9 col-sm-9 ">
  										<textarea class="resizable_textarea form-control" placeholder="This text area automatically resizes its height as you fill in more text courtesy of autosize-master it out..."></textarea>
  									</div>
  								</div>
  							</div>
  						</div>
  					</div>


  				</div>
  			</div>
  			<!-- /page content -->

      </div>
    </div>
<script type="text/javascript">

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
