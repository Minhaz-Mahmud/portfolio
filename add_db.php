<?php
include('dbknow.php');



//=================================== here is adding in work section========================================================================//


if(isset($_POST['add_work'])){
    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "images/".$filename;
    move_uploaded_file($tempname, $folder);

    $des = $_POST['des'];
    $work_name = $_POST['work_name'];

    if(empty( $work_name) || empty($folder) || empty($des)) {
        echo "Please fill out all fields";
    } else {
        $query = "INSERT INTO `work` (`w_head`, `pic`, `description`) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($conn, $query);

        // Bind parameters to the prepared statement
        mysqli_stmt_bind_param($stmt, "sss", $work_name, $folder, $des);

        if(mysqli_stmt_execute($stmt)){
            echo "Data inserted successfully";
        } else {
            echo "Query Failed: " . mysqli_error($conn);
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }
}



