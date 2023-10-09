
<?php

session_start();
include('config/myFunctions.php');
// Insert
if (isset($_POST['addCategory'])) {
    $category_name = $_POST['name'];
    $check_category = checkCategory($category_name);
    if (mysqli_num_rows($check_category) > 0) {
        $_SESSION['status'] = "Category Already Exist.";
        header("Location:category.php");
    } else {
        $user_query = "INSERT into category (name) VALUES ('$category_name')";
        $query_run = mysqli_query($con, $user_query);
        if ($query_run) {
            $_SESSION['status'] = "New Category Added Successfully";
            header("Location:category.php");
        } else {
            $_SESSION['status'] = "Category Adding Failed";
            header("Location:category.php");
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
        header("Location:category.php");
    } else {
 
        $query = "UPDATE category SET name='$category_name' Where id='$category_id' ";
        $query_run = mysqli_query($con, $query);
        if ($query_run) {
            $_SESSION['status'] = "Category updated Successfully";
            header("Location:category.php");
        } else {
            $_SESSION['status'] = "Category Updating Failed";
            header("Location:category.php");
        }
    }
}


// Delete
if (isset($_POST['deleteCategory'])) {
    $category_id = $_POST['delete_id'];
    $query = "DELETE from category where id='$category_id'";
    $query_run = mysqli_query($con, $query);
    if ($query_run) {
        $_SESSION['status'] = "Category Deleted Successfully";
        header("Location:category.php");
    } else {
        $_SESSION['status'] = "Category Cannot delete";
        header("Location:category.php");
    }
}
