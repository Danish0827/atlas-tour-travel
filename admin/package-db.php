<?php
session_start();
include('config/myFunctions.php');
if (isset($_POST['addPackage'])) {
    $slug = $_POST['slug'];
    $name = $_POST['name'];
    $days = $_POST['days'];
    $price = $_POST['price'];
    $dates = $_POST['dates'];
    $image = $_FILES['image']['name'];
    $check_category = checkPackage($name);
    if (mysqli_num_rows($check_category) > 0) {
        $_SESSION['status'] = "Package Already Exist";
        header("Location:package.php");
    } else {
        $user_query = "INSERT into package(slug,name, days , price, dates, image) VALUES ('$slug','$name','$days','$price','$dates','$image')";
        $query_run = mysqli_query($con, $user_query);
        if ($query_run) {
            move_uploaded_file($_FILES['image']['tmp_name'], "/upload" . $_FILES['image']['name']);
            $_SESSION['status'] = "Package Added Successfully";
            header("Location:package.php");
        } else {
            $_SESSION['status'] = "Package Adding Failed";
            header("Location:package.php");
        }
    }
}




if (isset($_POST['updatePackage'])) {
    $package_id = $_POST['package_id'];
    $slug = $_POST['slug'];
    $name = $_POST['name'];
    $days = $_POST['days'];
    $price = $_POST['price'];
    $dates = $_POST['dates'];
    $image = $_FILES['image']['name'];
    $image_old=$_POST['image_old'];
    
    if ($image != '') {
        $update_filename_1 = $_FILES['image']['name'];
        echo $update_filename_1;
    } else {
        $update_filename_1 = $image_old;
    }
   
    $query = "UPDATE `package` SET `slug`='$slug',`name`='$name',`days`='$days',`price`='$price',`dates`='$dates',`image`='$update_filename_1' WHERE id='$package_id';";
    $query_run = mysqli_query($con, $query);
    if ($query_run) {
        if ($image != '') {
            move_uploaded_file($_FILES['image']['tmp_name'], "/upload" . $_FILES['image']['name']);
        }
        // move_uploaded_file($_FILES['image']['tmp_name'], "/upload" . $_FILES['image']['name']);
        $_SESSION['status'] = 'Package Updated Successfully';
        header("Location:package.php");
    } else {
        $_SESSION['status'] = 'Package Cannot be updated';
        header("Location:package.php");
    }
}



if (isset($_POST['deleteUser'])) {
    $package_id = $_POST['delete_id'];
    $query = "DELETE from package where id='$package_id'";
    $query_run = mysqli_query($con, $query);
    if ($query_run) {
        $_SESSION['status'] = "Package Deleted Successfully";
        header("Location:package.php");
    } else {
        $_SESSION['status'] = "Package Cannot delete";
        header("Location:package.php");
    }
}
