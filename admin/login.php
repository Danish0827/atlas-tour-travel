<?php

session_start();
include('config/dbcon.php');
if (isset($_SESSION['admin'])) {
    header('location:index.php');
}else if(isset($_SESSION['user'])){
    header('location:user.php');  
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Admin Panel</title>
    <link rel="stylesheet" href="login.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.0/mdb.min.css" rel="stylesheet" />
</head>

<body>
    <?php



    $Email = $_POST['Email'];
    $usertype = $_POST['usertype'];
    
    if (isset($_POST['submit'])) {
        $query = "SELECT * FROM `users` WHERE  `Email`='$_POST[Email]' AND `Password`='$_POST[Password]' AND `usertype`='$_POST[usertype]';";
        $result = mysqli_query($con, $query);
        $row = $result->fetch_assoc();
        $name=$row['Name'];
        if (mysqli_num_rows($result) > 0) {         
            if ($usertype == "admin") {
                $_SESSION['Name']=$name;
                $_SESSON['Email'] = $Email;
                $_SESSION['admin'] = $_POST['Email'];
                header('location:index.php');
            }else if ($usertype == "user") {
                $_SESSION['Name']=$name;
                $_SESSION['Email'] = $Email;
                $_SESSION['user'] = $_POST['Email'];
                header('location:user.php');
            }
        } else {
            $alert = 'Invalid Data Entered';
        }
    }

    ?>

    <section class="h-100 gradient-form" style="background-color: #eee;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-xl-10">
                    <div class="card rounded-3 text-black">

                        <div class="row g-0">

                            <div class="col-lg-6">
                                <form method="POST">
                                    <div class="card-body p-md-5 mx-md-4">

                                        <div class="text-center">
                                            <img src="lotus.png" style="width: 185px;" alt="logo">
                                            <h4 class="mt-1 mb-5 pb-1">Admin Panel Login</h4>

                                        </div>

                                        <form method="post">
                                            <p>Please login to your account</p>

                                            <input type="hidden" class="form-control" value="add_uuid" name="uuid" />
                                            <div class="form-outline mb-4">
                                                <input type="text" id="form2Example11" class="form-control" required name="Email" />
                                                <label class="form-label" for="form2Example11">Email</label>
                                            </div>


                                            <div class="form-outline mb-4">
                                                <input type="password" id="form2Example22" name="Password" class="form-control" />
                                                <label class="form-label" name="Password" for="form2Example22">Password</label>
                                            </div>
                                            <div class="form-outline mb-4">
                                                <select class="form-select" name="usertype">
                                                    <option selected>Select a Role</option>
                                                    <option value="admin">Admin</option>
                                                    <option value="user">User</option>
                                                </select>
                                            </div>



                                            <div class="text-center pt-1 mb-5 pb-1">
                                                <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" name="submit" type="submit">Log
                                                    in</button>
                                                <!-- <a class="text-danger" href="#!">Forgot password?</a> -->
                                                <p class="text-danger mb-0 me-2"><?php echo $alert; ?></p>
                                            </div>

                                            <!-- <div class="d-flex align-items-center justify-content-center pb-4">
                                                <p class="mb-0 me-2">Don't have an account?</p>
                                                <button type="button" class="btn btn-outline-danger">Create new</button>
                                            </div> -->


                                        </form>
                                    </div>
                            </div>


                            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                                <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                                    <h4 class="mb-4">We are more than just a company</h4>
                                    <p class="small mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                        exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>


</body>
<!-- MDB -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.0/mdb.min.js"></script>

</html>