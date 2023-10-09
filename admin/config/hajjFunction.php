<?php
include('config/dbcon.php');
function checkCategory($name){
    global $con_hajj;
    $query="SELECT name from hajj_category where `name`='$name'";
    return $query_run = mysqli_query($con_hajj, $query);
}
function checkPackageId($name,$id){
    global $con_hajj;
    $query="SELECT * from hajj_package where id='$id' And `name`='$name' ";
    return $query_run = mysqli_query($con_hajj, $query);
}
function checkPackage($name){
    global $con_hajj;
    $query="SELECT name from hajj_package where `name`='$name'";
    return $query_run = mysqli_query($con_hajj, $query);
}

function checkCategory_1($package_name,$name){
    global $con_hajj;
    $category_check="SELECT package_name,category_name FROM `hajj_categories` WHERE package_name='$package_name' And category_name='$name'";
    return $query_run = mysqli_query($con_hajj, $category_check);
}

function getPackageSlug($slug){
    global $con_hajj;
    $query="SELECT * from hajj_package where `id`='$slug'";
    return $query_run = mysqli_query($con_hajj, $query);
}

function getCategories($id){
    global $con_hajj;
    $query="SELECT * from hajj_categories where `id`=$id";
    return $query_run = mysqli_query($con_hajj, $query);
}

function PackageDetail($name){ 
    global $con_hajj;
    $query="SELECT hajj_package.id,hajj_package_detail.package_name from hajj_package_detail INNER JOIN hajj_package ON hajj_package_detail.package_name=hajj_package.name where hajj_package_detail.package_name='$name';";
    echo $query;

    return $query_run = mysqli_query($con_hajj, $query);
}
function packageDetailUpdate($name,$id){ 
    global $con_hajj;
    $query="SELECT hajj_package.name,hajj_package_detail.package_name from hajj_package_detail INNER JOIN hajj_package ON hajj_package_detail.package_name=hajj_package.name where hajj_package_detail.package_name='$name' And hajj_package_detail.id=$id;";
    echo $query;

    return $query_run = mysqli_query($con_hajj, $query);
}


?>