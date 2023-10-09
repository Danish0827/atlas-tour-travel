<?php
include('config/dbcon.php');
function checkCategory($name){
    global $con;
    $query="SELECT name from category where `name`='$name'";
    return $query_run = mysqli_query($con, $query);
}

function checkPackageCategoryId($name,$id){
    global $con;
    $query="SELECT id,package_name from categories where `package_name`='$name' And id='$id'";
    return $query_run = mysqli_query($con, $query);
}
function checkPackageId($name,$id){
    global $con;
    $query="SELECT * from package where id='$id' And `name`='$name' ";
    return $query_run = mysqli_query($con, $query);
}
function checkPackage($name){
    global $con;
    $query="SELECT name from package where `name`='$name'";
    return $query_run = mysqli_query($con, $query);
}

function checkCategory_1($package_name,$name){
    global $con;
    $category_check="SELECT package_name,category_name FROM `categories` WHERE package_name='$package_name' And category_name='$name'";
    return $query_run = mysqli_query($con, $category_check);
}


function getPackageSlug($slug){
    global $con;
    $query="SELECT * from package where `id`='$slug'";
    return $query_run = mysqli_query($con, $query);
}

function getCategories($id){
    global $con;
    $query="SELECT * from categories where `id`=$id";
    return $query_run = mysqli_query($con, $query);
}

function PackageDetail($name){ 
    global $con;
    $query="SELECT package.id,package_detail.package_name from package_detail INNER JOIN package ON package_detail.package_name=package.name where package_detail.package_name='$name';";

    return $query_run = mysqli_query($con, $query);
}
function packageDetailUpdate($name,$id){ 
    global $con;
    $query="SELECT package.id,package_detail.package_name from package_detail INNER JOIN package ON package_detail.package_name=package.name where package_detail.package_name='$name' And package_detail.id=$id;";

    return $query_run = mysqli_query($con, $query);
}


?>