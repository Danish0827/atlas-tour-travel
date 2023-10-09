<?php
require('config/dbcon.php');
require('config/hajjFunction.php');

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
  <title>Categories | Admin Panel</title>

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
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap4.min.css">
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
          <a href="index.php" class="nav-link">Home / Categories</a>
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
     
      <!-- Add Categories -->
      <div class="modal fade" id="addCategories" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Categories</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="hajj_categories-db.php" method="POST">
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-6 mb-3">
                    <label for="">Package Name list</label>
                    <?php
                    $category = "SELECT * from hajj_package";
                    $category_run = mysqli_query($con_hajj, $category);
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
                  <div class="col-md-6 mb-3">
                    <label for="">Categories list</label>
                    <?php
                    $category = "SELECT * from hajj_category";
                    $category_run = mysqli_query($con_hajj, $category);
                    if (mysqli_num_rows($category_run) > 0) {
                    ?>
                      <select name="category_name" required class="form-control">
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
                  <div class="col-md-6 mb-3">
                    <label for="">Makkah</label>
                    <input type="text" name="makkah" class="form-control" placeholder="Makkah">
                  </div>
                  <div class="col-md-6 mb-3">
                    <label for="">Madina</label>
                    <input type="text" name="madina" class="form-control" placeholder="Madina">
                  </div>
                  <div class="col-md-6 mb-3">
                    <label for="">4 in Room Price</label>
                    <input type="number" name="4_in_room" onkeyup="if(this.value<0){this.value= this.value * -1}" class="form-control" placeholder="4 in Room Price" required>
                  </div>
                  <div class="col-md-6 mb-3">
                    <label for="">3 in Room Price</label>
                    <input type="number" min=0 name="3_in_room" onkeyup="if(this.value<0){this.value= this.value * -1}" class="form-control" placeholder="3 in Room Price" required>
                  </div>
                  <div class="col-md-6 mb-3">
                    <label for="">2 in Room Price</label>
                    <input type="number" min=0 name="2_in_room" onkeyup="if(this.value<0){this.value= this.value * -1}" class="form-control" placeholder="2 in Room Price" required>
                  </div>

                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="addCategories" class="btn btn-primary">Save</button>
              </div>
            </form>
          </div>

        </div>
      </div>
      <!-- Categories Add End -->
      <!-- Categories Update  Start-->
      
      <!-- Category Update End -->

      <!-- Category Delete Start -->
      <div class="modal fade" id="deleteData" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Delete Categories</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="hajj_categories-db.php" method="POST">
              <div class="modal-body">
                <input type="hidden" name="delete_id" class="delete_id">
                <p>
                  Are You sure. You want to delete this data?
                </p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                <button type="submit" name="deleteCategories" class="btn btn-primary">Yes,Delete!</button>
              </div>
          </div>
          </form>
        </div>
      </div>

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
                  <h3 class="card-title">Categories
                  </h3> <a href="#" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#addCategories">Add Categories</a>

                </div>
                <!-- /.card-header -->
                <div class="container">
                  <div class="card-body">
                    <table id="datatable" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                        <th>ID</th>
                          <th>Package Name</th>
                          <th>Category Name</th>
                          <th>Makkah</th>
                          <th>Madina</th>
                          <th>4 In Room</th>
                          <th>3 In Room</th>
                          <th>2 In Room</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $i=0;
                        $query = "SELECT * FROM hajj_categories ";
                        $query_run = mysqli_query($con_hajj, $query);
                        if (mysqli_num_rows($query_run) > 0) {
                          foreach ($query_run as $row) {
                            $i++;
                        ?>
                            <tr>
                            <td><?= $i;?></td>
                              <td><?php echo ($row['package_name']); ?></td>
                              <td><?php echo ($row['category_name']); ?></td>
                              <td><?php echo ($row['makkah']); ?></td>
                              <td><?php echo ($row['madina']); ?></td>
                              <td><?php echo ($row['4_in_room']); ?></td>
                              <td><?php echo ($row['3_in_room']); ?></td>
                              <td><?php echo ($row['2_in_room']); ?></td>
                              <td>
                              <a href="hajj_categories-edit.php?category_id=<?php echo ($row['id']); ?>" class="btn btn-info btn-sm w-100 my-2">Edit</a>
                                <button type="button" value="<?php echo ($row['id']); ?>" class="btn btn-danger btn-sm deletebtn w-100 my-2">Delete</button>
                              </td>
                            </tr>
                          <?php
                          }
                        } else {

                          ?>
                          <tr>
                            <td class="text-center">No Post Found </td>
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
        var user_id = $(this).val();
        $('.delete_id').val(user_id);
        $('#deleteData').modal('show')
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
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
  
<script>
$(document).ready( function () {
    $('#datatable').DataTable({
      "pagingType":"full_numbers",
      "lengthMenu":[
        [5,25,50,-1],
        [5,10,20,"All"]
      ],
      searching: false,
      "bInfo" : false ,
         "bLengthChange" : false,
      responsive:true,
      language:{
        search:"_INPUT_",
        searchPlaceholder:"Search Records", 
      }
    });
} );

</script>


  <!-- AdminLTE for demo purposes -->

  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->

</body>

</html>