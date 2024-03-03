<?php
include('dbknow.php');

if(isset($_POST['add'])){
    $user= $_POST['username'];
    $pass = $_POST['pass'];
   
    if(empty($user)){
        echo "You must fill the icon";
    } else {
        $query = "INSERT INTO `admin` (`username`, `pass`) VALUES (?, ?)";
        $stmt = mysqli_prepare($conn, $query);

        mysqli_stmt_bind_param($stmt, "ss", $user, $pass);

        if(mysqli_stmt_execute($stmt)){
            header('location: admin.php?add_msg=You have sucessfully add  the data.');
        } else {
            echo "Query Failed: " . mysqli_error($conn);
        }

        mysqli_stmt_close($stmt);
    }
}