<?php
require('config/dbcon.php');
session_start();
if (!isset($_SESSION['admin']) && !isset($_SESSION['user']) || (trim($_SESSION['admin']) == '') && (trim($_SESSION['user']) == '')) {
    header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Package Detail | Admin Panel</title>
    <meta http-equiv="cache-control" content="no-cache" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="-1" />
    <!-- Summernote CSS - CDN Link -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <!-- //Summernote CSS - CDN Link -->
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
    <link rel="stylesheet" href="richtexteditor/rte_theme_default.css" />
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="index.php" class="nav-link">Home</a>
                </li>

            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->


                <!-- Messages Dropdown Menu -->

                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="index.php?link=logout" name="logout" class="dropdown-item">
                            <i class="fas fa-bell mr-2"></i> Logout
                            <span class="float-right text-muted text-sm"></span>
                        </a>
                </li>
                <?php
                if (isset($_GET['link'])) {
                    $_SESSION['link'] = $_GET['link'];
                    session_destroy();
                    header('location:login.php');
                }
                ?>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php include 'includes/adminSideBar.php'; ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <div class="content-header">

                <div class="container-fluid">
                    <div class="row ">
                        <div class="col-md-12">
                            <?php
                            if (isset($_SESSION['status'])) {
                                echo '<h4>' . $_SESSION['status'] . '</h4>';
                                unset($_SESSION['status']);
                            }
                            ?>
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Update Package Detail
                                    </h3>
                                    <a href="package_detail.php" class="btn btn-primary btn-sm btn-danger float-right">Back</a>
                                </div>
                                <div class="card-body">
                                    <?php
                                    if (isset($_GET['package_detail_id'])) {
                                        $package_detail_id = $_GET['package_detail_id'];
                                        $query = "SELECT * FROM package_detail WHERE id='$package_detail_id'";
                                        $query_run = mysqli_query($con, $query);
                                        if (mysqli_num_rows($query_run) > 0) {
                                            foreach ($query_run as $row) {
                                    ?>
                                                <form action="package_detail_db.php" method="POST" enctype="multipart/form-data">
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <input type="hidden" name="package_detail_id" value="<?= $row['id'] ?>">
                                                            <input type="hidden" name="package_id" value="<?= $row['package_id'] ?>">
                                                            <div class="col-md-12 mb-3">
                                                                <label for="">Package Name list</label>
                                                                <?php
                                                                $category = "SELECT * from package";
                                                                $category_run = mysqli_query($con, $category);
                                                                if (mysqli_num_rows($category_run) > 0) {
                                                                ?>
                                                                    <select name="package_name" required class="form-control">
                                                                        <option value=""> Select Category </option>
                                                                        <?php foreach ($category_run as $categoryitem) { ?>
                                                                            <option value="<?php echo $categoryitem['name'] ?>"><?php echo $categoryitem['name'] ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                <?php } else {
                                                                ?>
                                                                    <option>No Category Found</option>
                                                                <?php
                                                                }
                                                                ?>
                                                            </div>
                                                            <div class="col-md-12 mb-3">
                                                                <label for="">Notes</label>
                                                                <textarea id="notes" type="text" name="notes" class="form-control" placeholder="Notes"><?= $row['notes'] ?></textarea>
                                                            </div>
                                                            <div class="col-md-12 mb-3">
                                                                <label for="">Includes</label>
                                                                <textarea id="includes" type="text" name="includes" class="form-control" placeholder="Includes"><?= $row['includes'] ?></textarea>
                                                            </div>
                                                            <div class="col-md-12 mb-3">
                                                                <label for="">Requirements</label>
                                                                <textarea id="requirements" type="text" name="requirements" class="form-control" placeholder="Requirements"><?= $row['requirements'] ?></textarea>
                                                            </div>
                                                            <div class="col-md-12 mb-3">
                                                                <label for="">Tnc</label>
                                                                <textarea id="tnc" type="text" name="tnc" class="form-control" placeholder="Tnc"><?= $row['tnc'] ?></textarea>
                                                            </div>
                                                            <div class="col-md-12 mb-3">
                                                                <button type="submit" name="updatePackageDetail" class="btn btn-success">Update Package Details</button>
                                                            </div>
                                                        </div>




                                                    </div>
                                                </form>
                                            <?php
                                            }
                                        } else {

                                            ?>
                                            <tr>
                                                <td class="text-center">No Categories Found </td>
                                            </tr><?php
                                                }
                                            }
                                                    ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- /.content-wrapper -->
    <?php include 'footer.php'; ?>

    <!-- Control Sidebar -->

    <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->

    <!-- Sparkline -->

    <!-- JQVMap -->

    <!-- jQuery Knob Chart -->
    <!-- daterangepicker -->
    <!-- Tempusdominus Bootstrap 4 -->
    <!-- Summernote -->
    <!-- overlayScrollbars -->

    <!-- AdminLTE App -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="dist/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->
    <!-- Summernote JS - CDN Link -->


    <script type="text/javascript" src="richtexteditor/rte.js"></script>
    <script type="text/javascript" src='richtexteditor/plugins/all_plugins.js'></script>
    <script>
        var notes = new RichTextEditor("#notes");
        var includes = new RichTextEditor("#includes");
        var requirements = new RichTextEditor("#requirements");
        var tnc = new RichTextEditor("#tnc");
        //editor1.setHTMLCode("Use inline HTML or setHTMLCode to init the default content.");
    </script>
    <!-- //Summernote JS - CDN Link -->
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->

</body>

</html>