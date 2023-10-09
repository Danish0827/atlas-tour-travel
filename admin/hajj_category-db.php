
<?php

session_start();
include('config/hajjFunction.php');
// Insert
if (isset($_POST['addCategory'])) {
    $category_name = $_POST['name'];
    $check_category = checkCategory($category_name);
    if (mysqli_num_rows($check_category) > 0) {
        $_SESSION['status'] = "Category Already Exist.";
        header("Location:hajj_category.php");
    } else {
        $user_query = "INSERT into hajj_category (name) VALUES ('$category_name')";
        $query_run = mysqli_query($con_hajj, $user_query);
        if ($query_run) {
            $_SESSION['status'] = "New Category Added Successfully";
            header("Location:hajj_category.php");
        } else {
            $_SESSION['status'] = "Category Adding Failed";
            header("Location:hajj_category.php");
        }
    }
}

// Update
if (isset($_POST['updateCategory'])) {
    $category_id = $_POST['category_id'];
    $category_name = $_POST['name'];
    $check_category = checkCategory($category_name);
    if (mysqli_num_rows($check_category) != 0) {
        $_SESSION['status'] = "Category Already Exist.";
        header("Location:hajj_category.php");
    } else {
 
        $query = "UPDATE hajj_category SET name='$category_name' Where id='$category_id'";
        $query_run = mysqli_query($con_hajj, $query);
        if ($query_run) {
            $_SESSION['status'] = "Category updated Successfully";
            header("Location:hajj_category.php");
        } else {
            $_SESSION['status'] = "Category Updating Failed";
            header("Location:hajj_category.php");
        }
    }
}

// Delete
if (isset($_POST['deleteCategory'])) {
    $category_id = $_POST['delete_id'];
    $query = "DELETE from hajj_category where id='$category_id'";
    $query_run = mysqli_query($con_hajj, $query);
    if ($query_run) {
        $_SESSION['status'] = "Category Deleted Successfully";
        header("Location:hajj_category.php");
    } else {
        $_SESSION['status'] = "Category Cannot delete";
        header("Location:hajj_category.php");
    }
}
