<?php
session_start();
include('config/hajjFunction.php');
if (isset($_POST['addCategories'])) {
    $package_name = $_POST['package_name'];
    $category_name = $_POST['category_name'];
    $makkah = $_POST['makkah'];
    $madina = $_POST['madina'];
    $two_in_room = $_POST['2_in_room'];
    $three_in_room = $_POST['3_in_room'];
    $four_in_room = $_POST['4_in_room'];

    $check_package = checkPackage($package_name);
    $check_category = checkCategory_1($package_name, $category_name);




    if (mysqli_num_rows($check_package) != 0) {
        if (mysqli_num_rows($check_category) == 0) {
        
            $user_query = "INSERT into `hajj_categories`( `package_name`, `category_name`, `makkah`, `madina`, `4_in_room`, `3_in_room`, `2_in_room`)  VALUES ('$package_name','$category_name','$makkah','$madina','$four_in_room','$three_in_room','$two_in_room')";
            $query_run = mysqli_query($con_hajj, $user_query);
            if ($query_run) {
                $_SESSION['status'] = "Package Added Successfully";
                header("Location:hajj_categories.php");
            } else {
                $_SESSION['status'] = "Package Adding Failed";
                header("Location:hajj_categories.php");
            }
        } else {
            $_SESSION['status'] = "Category Already Exist";
            header("Location:hajj_categories.php");
        }
    } else {
        $_SESSION['status'] = "Cannot Add Package";
        header("Location:hajj_categories.php");
    }
}




if (isset($_POST['updateCategories'])) {
    $category_id = $_POST['category_id'];
    $package_id = $_POST['package_id'];
    $package_name = $_POST['package_name'];
    $category_name = $_POST['category_name'];
    $makkah = $_POST['makkah'];
    $madina = $_POST['madina'];
    $four_in_room = $_POST['4_in_room'];
    $three_in_room = $_POST['3_in_room'];
    $two_in_room = $_POST['2_in_room'];




    $query = "UPDATE `hajj_categories` SET `package_name`='$package_name',`category_name`='$category_name',`makkah`='$makkah',`madina`='$madina',`4_in_room`='$four_in_room',`3_in_room`='$three_in_room',`2_in_room`='$two_in_room' WHERE id='$category_id'";
    $query_run = mysqli_query($con_hajj, $query);
    if ($query_run) {
        $_SESSION['status'] = "Categories Updated Successfully";
        header("Location:hajj_categories.php");
    } else {
        $_SESSION['status'] = "Categories Cannot Updated";
        header("Location:hajj_categories.php");
    }
}



if (isset($_POST['deleteCategories'])) {
    $categories_id = $_POST['delete_id'];
    $query = "DELETE from hajj_categories where id='$categories_id'";
    $query_run = mysqli_query($con_hajj, $query);
    if ($query_run) {
        $_SESSION['status'] = "Categories Deleted Successfully";
        header("Location:hajj_categories.php");
    } else {
        $_SESSION['status'] = "Categories Cannot delete";
        header("Location:hajj_categories.php");
    }
}
