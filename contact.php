<?php
include('dbknow.php');

if(isset($_POST['send'])){
    $name= $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    if(empty($name) || empty($email) || empty($message)){                        
        echo "You must fill all fields";
    } else {
        $query = "INSERT INTO `contact` (`name`, `email`, `message`) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($conn, $query);

        mysqli_stmt_bind_param($stmt, "sss", $name, $email, $message);

        if(mysqli_stmt_execute($stmt)){
            header('location: admin.php?add_msg=You have sucessfully add the data.');
        } else {
            echo "Query Failed: " . mysqli_error($conn);
        }

        mysqli_stmt_close($stmt);
    }
}