<?php
session_start();
include('config/myFunctions.php');
include('config/dbcon.php');
if (isset($_POST['addPackageDetail'])) {
    $package_name = $_POST['package_name'];
    $notes = $_POST['notes'];
    $includes = $_POST['includes'];
    $requirements = $_POST['requirements'];
    $tnc = $_POST['tnc'];
    

    $PackageDetail = PackageDetail($package_name);
        if (mysqli_num_rows($PackageDetail) == 0) {
            $user_query = "INSERT into `package_detail`(`package_name`, `notes`, `includes`, `requirements`,  `tnc`)  VALUES ('$package_name','$notes','$includes','$requirements','$tnc')";
            echo $user_query;
            $query_run = mysqli_query($con, $user_query);
            if ($query_run) {
                $_SESSION['status'] = "Package Details Added Successfully";
                header("Location:package_detail.php");
            } else {
                $_SESSION['status'] = "Package Details Adding Failed";
                header("Location:package_detail.php");
            }
        } else {
            $_SESSION['status'] = "Something went wrong";
            header("Location:package_detail.php");
        }
}


// if ($query_run) {
//     move_uploaded_file($_FILES['image']['tmp_name'], "upload/" . $filename);
//     $_SESSION['status'] = "Post Created Succesfully";
//     header("Location:post.php");

// } else {
//     $_SESSION['status'] = "Something went wrong";
//     header("Location:post.php");
// }

// INSERT INTO `posts`(`category_id`, `name`, `slug`, `description`, `image`, `meta_title`, `meta_description`, `meta_keyword`, `status`) VALUES (1,'Safwan','Mirza','asdasdasd','asdasdasd','asdasd,asdmasd',1)




if (isset($_POST['updatePackageDetail'])) {
    $package_detail_id = $_POST['package_detail_id'];
    $package_name = $_POST['package_name'];
    $notes = $_POST['notes'];
    $includes = $_POST['includes'];
    $requirements = $_POST['requirements'];
    $tnc = $_POST['tnc'];
    $PackageDetail = packageDetailUpdate($package_name,$package_detail_id);
    if (mysqli_num_rows($PackageDetail) != 0) {
        echo 1;
        $query = "UPDATE `package_detail` SET `id`='$package_detail_id',`package_name`='$package_name',`notes`='$notes',`includes`='$includes',`requirements`='$requirements',`tnc`='$tnc' Where id='$package_detail_id'";

        $query_run = mysqli_query($con, $query);
        if ($query_run) {
            $_SESSION['status'] = 'Package Detail Updated Successfully';
            header("Location:package_detail.php");
        } else {
            $_SESSION['status'] = 'Package Detail Cannot be updated';
            header("Location:package_detail.php");
        }
    } else {
        $_SESSION['status'] = 'Something Went Wrong';
        header("Location:package_detail.php");
    }
}

// UPDATE `posts` SET `category_name`='pastries',`name`='Pastries',`slug`='saddsadassasdasdsad',`description`='asdansdasd',`image`='pastries.jpeg',`meta_title`='sadsadsadasd',`meta_description`='sdadjasdas',`meta_keyword`='sadsadsad',`status`='1' WHERE id=4


if (isset($_POST['deletePackageDetail'])) {
    $package_detail_id = $_POST['package_delete_id'];
    $query = "DELETE from package_detail where id='$package_detail_id'";
    $query_run = mysqli_query($con, $query);
    if ($query_run) {
        $_SESSION['status'] = "Package Detail Deleted Successfully";
        header("Location:package_detail.php");
    } else {
        $_SESSION['status'] = "Package Detail Cannot delete";
        header("Location:package_detail.php");
    }
}
