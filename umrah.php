<?php include 'admin/config/dbcon.php';
include 'admin/config/myFunctions.php'; ?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="zxx">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="cache-control" content="no-cache" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="-1" />
    <title>Atlas - Hajj and Umrah Services</title>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <!--Custom CSS-->
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <!--Plugin CSS-->
    <link href="css/plugin.css" rel="stylesheet" type="text/css">
    <!--Flaticons CSS-->
    <link href="fonts/flaticon.css" rel="stylesheet" type="text/css">
    <!--Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">

    <link rel="stylesheet" href="fonts/line-icons.css" type="text/css">
    <style>
        ul.sidebar-categorysed li {
            position: relative;
            margin: 0 0 12px;
            background: #fff;
            padding: 10px 0px;
            /* border: 1px solid #f1f1f1; */
            display: block;
        }
    </style>
</head>

<body onkeydown="if(!event.target.matches('input')&&!event.target.matches('textarea'))return!1" oncontextmenu="return!1" onselectstart="return!1" ondragstart="return!1">

    <?php include 'navbar.php' ?>


    <!-- BreadCrumb Starts -->
    <section class="breadcrumb-main pb-6" style="background-image: url(images/slider/umrah.jpg);">
        <div class="breadcrumb-outer pt-10">
            <div class="container">
                <div class="breadcrumb-content d-md-flex align-items-center pt-10" style="margin-bottom: -60px;">
                    <h2 style="padding-top:20px;padding-bottom:140px;" class="mb-0">Umrah</h2>
                    <nav aria-label="breadcrumb" style="margin-bottom: -30px;">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Umrah</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <div class="dot-overlay"></div>
    </section>
    <!-- BreadCrumb Ends -->


    <!-- blog starts -->
    <?php
    $query = "SELECT * from package";
    $query_run = mysqli_query($con, $query);
    if (mysqli_num_rows($query_run) > 0) {
        foreach ($query_run as $row) {
            $name = $row['name'];
    ?>

            <div id="<?= $row['slug'] ?>">
                <section class="blog destination-b py-5 ">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 package1" style="box-shadow: 0 0 20px 0 rgb(0 0 0 / 40%);">
                                <div class="blog-full d-flex justify-content-around mb-4">
                                    <div class="row w-100">
                                        <div class="col-lg-5 col-md-4 col-xs-12 blog-height">
                                            <div class="blog-image">
                                                <a href="blog-single.html" style="background-image: url(admin/upload/<?= $row['image'] ?>);"></a>
                                            </div>
                                        </div>
                                        <div class="col-lg-7 col-md-8 col-xs-12">
                                            <div class="trend-content-main" style="padding: 15px;">
                                                <div class="trend-content pt-2 pb-2">
                                                    <h3 class="mb-1" style="padding-bottom: 15px;"><?= $row['name'] ?></h3>
                                                    <div class="mb-2">
                                                        <h5 style="margin-left: 10px;">Dates: <?= $row['dates'] ?></h5>
                                                    </div>
                                                    <div class="rating border-b pb-1 mb-1">
                                                        <p style="margin-left: 10px;" class="mb-0"><?= $row['days'] ?></p>
                                                    </div>
                                                    <!--<div class="trend-last-main">-->
                                                    <!--    <div class="trend-last d-flex align-items-center justify-content-between border-b pb-1 mb-2">-->
                                                    <!--        <span>Breakfast</span>-->
                                                    <!--        <span>Free Cancellation</span>-->
                                                    <!--        <span>Pay at the hotel</span>-->
                                                    <!--    </div>-->
                                                    <!--</div>-->

                                                    <div style="padding: 20px 0;" class="trend-daily">
                                                        <h4 class="mb-0 pink font-weight-bold">From &#8377;<?php $amount = $row['price'];
                                                                                                            $price = preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $amount);
                                                                                                            echo $price; ?> <small>/ person</small></h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 dkjasdhif" style="display: flex;">
                                    <div class="col-md-6">
                                        <?php
                                        $query = "SELECT categories.*,package.name from categories INNER JOIN package ON categories.package_name=package.name where categories.package_name='$name'";


                                        $query_run = mysqli_query($con, $query);
                                        if (mysqli_num_rows($query_run) > 0) {
                                            foreach ($query_run as $row) {
                                        ?>
                                                <div class="sidebar-item mb-4" style="border: 1px solid;padding: 30px;">

                                                    <h3 class=""><?= $row['category_name']; ?></h3>
                                                    <ul class="sidebar-categorysed">
                                                        <li>
                                                            <td><i class="fa fa-kaaba pink mr-1" aria-hidden="true"></i> MAKKAH : <dync><?= $row['makkah']; ?></dync>
                                                            </td>
                                                        </li>
                                                        <li>
                                                            <td><i class="fa fa-mosque pink mr-1" aria-hidden="true"></i> MADINAH : <dync><?= $row['madina']; ?></dync>
                                                            </td>
                                                        </li>
                                                        <li>
                                                            <td><i class="fa fa-users pink mr-1" aria-hidden="true"></i> 4 IN A ROOM : <dync><span>₹ <?php $amount = $row['4_in_room'];
                                                                                                                                                        $price = preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $amount);
                                                                                                                                                        echo $price; ?><small>/ person</small></span></dync>
                                                            </td>
                                                        </li>
                                                        <li>
                                                            <td><i class="fa fa-users pink mr-1" aria-hidden="true"></i> 3 IN A ROOM : <dync><span>₹ <?php $amount = $row['3_in_room'];
                                                                                                                                                        $price = preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $amount);
                                                                                                                                                        echo $price; ?><small>/ person</small></span></dync>
                                                            </td>
                                                        </li>
                                                        <li>
                                                            <td><i class="fa fa-users pink mr-1" aria-hidden="true"></i> 2 IN A ROOM : <dync><span>₹ <?php $amount = $row['2_in_room'];
                                                                                                                                                        $price = preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $amount);
                                                                                                                                                        echo $price; ?><small>/ person</small></span></dync>
                                                            </td>
                                                        </li>
                                                    </ul>
                                                </div>
                                        <?php    }
                                        } else {
                                            echo "<h4>No Records Found.!</h4>";
                                        }
                                        ?>

                                    </div>
                                    <div class="col-md-6">
                                        <?php
                                        $query = "SELECT package_detail.*,package.name from package_detail INNER JOIN package ON package_detail.package_name=package.name where package_detail.package_name='$name'";
                                        $query_run = mysqli_query($con, $query);
                                        if (mysqli_num_rows($query_run) > 0) {
                                            foreach ($query_run as $row) {
                                        ?>
                                                <div class="accrodion-grp faq-accrodion mb-4" data-grp-name="faq-accrodion">
                                                    <div class="accrodion">
                                                        <div class="accrodion-title">
                                                            <h5 class="mb-0">Notes</h5>
                                                        </div>
                                                        <div class="accrodion-content" style="display: block;">
                                                            <div class="inner">
                                                                <div class="desc-boxsed">
                                                                    <?= $row['notes']; ?>
                                                                </div>
                                                            </div><!-- /.inner -->
                                                        </div>
                                                    </div>
                                                    <div class="accrodion">
                                                        <div class="accrodion-title">
                                                            <h5 class="mb-0">Package Includes </h5>
                                                        </div>
                                                        <div class="accrodion-content" style="display: none;">
                                                            <div class="inner">
                                                                <div class="desc-boxsed">
                                                                    <ul>
                                                                        <?= $row['includes']; ?>
                                                                    </ul>
                                                                </div>
                                                            </div><!-- /.inner -->
                                                        </div>
                                                    </div>
                                                    <div class="accrodion">
                                                        <div class="accrodion-title">
                                                            <h5 class="mb-0">Booking Requirements </h5>
                                                        </div>
                                                        <div class="accrodion-content" style="display: none;">
                                                            <div class="inner">
                                                                <div class="desc-boxsed">
                                                                    <ul>
                                                                        <?= $row['requirements']; ?>
                                                                    </ul>
                                                                </div>
                                                            </div><!-- /.inner -->
                                                        </div>
                                                    </div>
                                                    <div class="accrodion">
                                                        <div class="accrodion-title">
                                                            <h5 class="mb-0">Package Excludes, Terms & Conditions</h5>
                                                        </div>
                                                        <div class="accrodion-content" style="display: none;">
                                                            <div class="inner">
                                                                <div class="desc-boxsed">
                                                                    <ul>
                                                                        <?= $row['tnc']; ?>
                                                                    </ul>
                                                                </div>
                                                            </div><!-- /.inner -->
                                                        </div>
                                                    </div>
                                                </div>
                                        <?php
                                            }
                                        } else {
                                            echo "<h4>No Records Found.!</h4>";
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </section>
            </div>

    <?php
        }
    } else {
        echo "<h4>No Records Found.!</h4>";
    }

    ?>


    <!-- footer starts -->

    <?php include 'footer.php' ?>

    <!-- footer ends -->

    <!-- Back to top start -->
    <div id="back-to-top">
        <a href="#"></a>
    </div>
    <!-- Back to top ends -->

    <!-- search popup -->
    <div id="search1">
        <button type="button" class="close">×</button>
        <form>
            <input type="search" value="" placeholder="type keyword(s) here" />
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
    </div>

    <!-- Register Modal -->
    <div class="modal fade" id="register" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bordernone p-0">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-0">
                    <div class="login-content p-4 text-center">
                        <div class="login-title section-border">
                            <h3 class="pink mb-1">Register</h3>
                            <p>Access thousands of online classes in design, business, and more!</p>
                        </div>
                        <div class="login-form text-center">
                            <form>
                                <div class="form-group">
                                    <input type="text" placeholder="Enter Full Name">
                                </div>
                                <div class="form-group">
                                    <input type="email" placeholder="Enter email address">
                                </div>
                                <div class="form-group">
                                    <input type="password" placeholder="Enter password">
                                </div>
                                <div class="form-group">
                                    <input type="password" placeholder="Confirm password">
                                </div>
                            </form>
                            <div class="form-btn">
                                <a href="#" class="nir-btn">Register</a>
                            </div>
                            <div class="form-group mb-0 form-checkbox mt-3">
                                <input type="checkbox"> By clicking this, you are agree to to<a href="#" class=""> our terms of use</a> and <a href="#" class="">privacy policy</a> including the use of cookies
                            </div>
                        </div>
                        <div class="login-social border-t mt-3 pt-2 mb-3">
                            <p class="mb-2">OR continue with</p>
                            <a href="#" class="btn-facebook"><i class="fab fa-facebook" aria-hidden="true"></i> Facebook</a>
                            <a href="#" class="btn-twitter"><i class="fab fa-twitter" aria-hidden="true"></i> Twitter</a>
                            <a href="#" class="btn-google"><i class="fab fa-google" aria-hidden="true"></i> Google</a>
                        </div>
                        <div class="sign-up">
                            <p class="m-0">Already have an account? <a href="login.html" class="pink">Login</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- login Modal -->
    <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bordernone p-0">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-0">
                    <div class="login-content p-4 text-center">
                        <div class="login-title section-border">
                            <h3 class="pink">Login</h3>
                        </div>
                        <div class="login-form">
                            <form>
                                <div class="form-group">
                                    <input type="email" placeholder="Enter email address">
                                </div>
                                <div class="form-group">
                                    <input type="password" placeholder="Enter password">
                                </div>
                            </form>
                            <div class="form-btn">
                                <a href="#" class="nir-btn">LOGIN</a>
                            </div>
                            <div class="form-group mb-0 form-checkbox mt-3">
                                <input type="checkbox"> Remember Me | <a href="#" class="">Forgot password?</a>
                            </div>
                        </div>
                        <div class="login-social border-t mt-3 pt-2 mb-3">
                            <p class="mb-2">OR continue with</p>
                            <a href="#" class="btn-facebook"><i class="fab fa-facebook" aria-hidden="true"></i> Facebook</a>
                            <a href="#" class="btn-twitter"><i class="fab fa-twitter" aria-hidden="true"></i> Twitter</a>
                        </div>
                        <div class="sign-up">
                            <p class="m-0">Do not have an account? <a href="login.html" class="pink">Sign Up</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- header side menu -->
    <div class="header_sidemenu">
        <div class="header_sidemenu_in">
            <div class="menu">
                <div class="close-menu">
                    <i class="fa fa-times white"></i>
                </div>
                <div class="m-contentmain">
                    <div class="cart-main">
                        <div class="cart-box">
                            <div class="popup-container">
                                <h5 class="p-3 mb-0 bg-pink white text-caps">My Carts(3 Items)</h5>
                                <div class="cart-entry d-flex align-items-center p-3">
                                    <a href="#" class="image">
                                        <img src="images/shop/shop1.jpg" alt="">
                                    </a>
                                    <div class="content">
                                        <a href="#" class="title font-weight-bold">Pullover Batwing</a>
                                        <p class="quantity m-0">Quantity: 3</p>
                                        <span class="price">$45.00</span>
                                    </div>
                                    <div class="button-x">
                                        <i class="icon-close"></i>
                                    </div>
                                </div>
                                <div class="cart-entry d-flex align-items-center p-3">
                                    <a href="#" class="image">
                                        <img src="images/shop/shop2.jpg" alt="">
                                    </a>
                                    <div class="content">
                                        <a href="#" class="title font-weight-bold">Pullover Batwing</a>
                                        <p class="quantity m-0">Quantity: 3</p>
                                        <span class="price">$90.00</span>
                                    </div>
                                    <div class="button-x">
                                        <i class="icon-close"></i>
                                    </div>
                                </div>
                                <div class="cart-entry d-flex align-items-center p-3">
                                    <a href="#" class="image">
                                        <img src="images/shop/shop6.jpg" alt="">
                                    </a>
                                    <div class="content">
                                        <a href="#" class="title font-weight-bold">Pullover Batwing</a>
                                        <p class="quantity m-0">Quantity: 3</p>
                                        <span class="price">$90.00</span>
                                    </div>
                                    <div class="button-x">
                                        <i class="icon-close"></i>
                                    </div>
                                </div>
                                <div class="summary-total">
                                    <div class="summary d-flex align-items-center justify-content-between">
                                        <div class="subtotal font-weight-bold">Delivery Charge</div>
                                        <div class="price-s">$10</div>
                                    </div>
                                    <div class="summary d-flex align-items-center justify-content-between">
                                        <div class="subtotal font-weight-bold">Sub Total</div>
                                        <div class="price-s">$200</div>
                                    </div>
                                    <div class="summary d-flex align-items-center justify-content-between">
                                        <div class="subtotal font-weight-bold">Discount</div>
                                        <div class="price-s">$2</div>
                                    </div>
                                    <div class="summary d-flex align-items-center justify-content-between">
                                        <div class="subtotal font-weight-bold">Total</div>
                                        <div class="price-s">$208</div>
                                    </div>
                                </div>
                                <div class="cart-buttons d-flex align-items-center justify-content-between">
                                    <a href="#" class="nir-btn">View Cart</a>
                                    <a href="#" class="nir-btn-black">Checkout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="overlay hide"></div>
        </div>
    </div>

    <!-- *Scripts* -->
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugin.js"></script>
    <script src="js/main.js"></script>
    <script src="js/custom-nav.js"></script>
    <script src="js/custom-date.js"></script>
    <script src="js/custom-accordian.js"></script>
</body>

</html>