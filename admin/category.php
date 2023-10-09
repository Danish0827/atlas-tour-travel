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
    <title>Category | Admin Panel</title>

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
</head>
<style>
    @media screen and (max-width:767px) {
        .margin-top {
            margin: 5px;
        }

        .width-100 {
            width: 100%;
        }
    }
</style>

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
                    <a href="index.php" class="nav-link">Home / Category</a>
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

        <?php if ($_SESSION['admin'] == true) {
            include 'includes/adminSideBar.php';
        } else {
            include 'includes/userSideBar.php';
        } ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Category Add -->
            <div class="modal fade" id="addCategory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Category</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="category-db.php" method="POST">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="">Category Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Name" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" name="addCategory" class="btn btn-primary">Save</button>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
                <!-- Category Update End -->
            <!-- Category Add Start-->
            <div class="modal fade" id="updateCategory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Category</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="category-db.php" method="POST">
                            <div class="modal-body">
                                <div class="form-group">
                                <input type="hidden" name="category_id" class="update_id">
                                    <label for="">Category Name</label>
                                    <input type="text" name="name"  class="form-control" placeholder="Name" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" name="updateCategory" class="btn btn-primary">Update</button>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
              <!-- Category Update End -->

            <!-- Category Delete Start -->
            <div class="modal fade" id="deleteData" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Delete Category</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="category-db.php" method="POST">
                            <div class="modal-body">
                                <input type="hidden" name="delete_id" class="delete_user_id">
                                <p>
                                    Are You sure. You want to delete this data?
                                </p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                <button type="submit" name="deleteCategory" class="btn btn-primary">Yes,Delete!</button>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
             <!-- Category Delete End -->

            <!-- Content Header (Page header) -->
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
                                    <h3 class="card-title">Category
                                    </h3>
                                    <a href="#" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#addCategory">Add Category</a>
                                </div>
                                <!-- /.card-header -->
                                <div class="container">
                                    <div class="card-body">
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Category Name</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $query = "SELECT * FROM category;";
                                                $query_run = mysqli_query($con, $query);
                                                if (mysqli_num_rows($query_run) > 0) {
                                                    foreach ($query_run as $row) {
                                                ?>
                                                        <tr>
                                                            <td><?php echo ($row['id']); ?></td>
                                                            <td><?php echo ($row['name']); ?></td>
                                                            <td>
                                                            <button type="button" value="<?php echo ($row['id']); ?>" class="btn btn-success btn-sm updatebtn width-100 margin-top">Update</button>
                                                                <button type="button" value="<?php echo ($row['id']); ?>" class="btn btn-danger btn-sm deletebtn width-100 margin-top">Delete</button>
                                                            </td>
                                                        </tr>
                                                    <?php
                                                    }
                                                } else {

                                                    ?>
                                                    <tr>
                                                        <td class="text-center">No Category Found </td>
                                                    </tr><?php
                                                        }

                                                            ?>

                                            </tbody>
                                        </table>
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

    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <script>
        $(document).ready(function() {
            $('.deletebtn').click(function(e) {
                e.preventDefault();
                var category_id = $(this).val();
                $('.delete_user_id').val(category_id);
                // console.log(user_id);
                $('#deleteData').modal('show')
            });
            $('.updatebtn').click(function(e) {
                e.preventDefault();
                var category_id = $(this).val();
                $('.update_id').val(category_id);
                // console.log(user_id);
                $('#updateCategory').modal('show')
            });
        });
        
    </script>
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
    <script src="dist/js/adminlte.js"></script>


    <!-- AdminLTE for demo purposes -->

    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->

</body>

</html>