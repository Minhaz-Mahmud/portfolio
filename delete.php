
<!--======================================================================== wrok delete    ================================================= -->

<?php include('dbknow.php'); ?>

<?php

if(isset($_GET['work_id'])){
    $id=$_GET['work_id'];

$query="delete from `work` where `id`='$id'";
$result=mysqli_query($conn,$query);

if(!$result){
    die("Query failed".mysqli_error($conn));
}

else{
    header('location: admin.php?dlt_msg=You have sucessfully deleted the data.');
}

}

if(isset($_GET['know_id'])){
    $id=$_GET['know_id'];

    $query="delete from `know` where `id`='$id'";
    $result=mysqli_query($conn,$query);

    if(!$result){
        die("Query failed".mysqli_error($conn));
    } else {
        header('location: admin.php?dlt_msg=You have sucessfully deleted the data.');
    }
}

if(isset($_GET['hobby_id'])){
    $id=$_GET['hobby_id'];

    $query="delete from `hobby` where `id`='$id'";
    $result=mysqli_query($conn,$query);

    if(!$result){
        die("Query failed".mysqli_error($conn));
    } else {
        header('location: admin.php?dlt_msg=You have sucessfully deleted the data.');
    }
}

if(isset($_GET['admin_id'])){
    $id=$_GET['admin_id'];

    $query="delete from `admin` where `id`='$id'";
    $result=mysqli_query($conn,$query);

    if(!$result){
        die("Query failed".mysqli_error($conn));
    } else {
        header('location: admin.php?dlt_msg=You have sucessfully deleted the data.');
    }
}


if(isset($_GET['contact_id'])){
    $id=$_GET['contact_id'];

    $query="delete from `contact` where `id`='$id'";
    $result=mysqli_query($conn,$query);

    if(!$result){
        die("Query failed".mysqli_error($conn));
    } else {
        header('location: admin.php?dlt_msg=You have sucessfully deleted the data.');
    }
}





?>