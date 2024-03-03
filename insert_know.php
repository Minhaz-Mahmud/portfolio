<?php
include('dbknow.php');

if(isset($_POST['add'])){
    $icon = $_POST['icon'];
    $head = $_POST['head'];
    $des = $_POST['des'];

    if(empty($icon)){
        echo "You must fill the icon";
    } else {
        $query = "INSERT INTO `know` (`icon`, `head`, `des`) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($conn, $query);

        mysqli_stmt_bind_param($stmt, "sss", $icon, $head, $des);

        if(mysqli_stmt_execute($stmt)){
            header('location: admin.php?add_msg=You have sucessfully added the data.');
        } else {
            echo "Query Failed: " . mysqli_error($conn);
        }

        mysqli_stmt_close($stmt);
    }
}

if(isset($_POST['add_hobby'])){
    $filename= $_FILES["uploadfile"]["name"];
    $tempname= $_FILES["uploadfile"]["tmp_name"];
    $folder="images/".$filename;
    move_uploaded_file($tempname,$folder);

    $link=$_POST['link'];
    $h_head=$_POST['h_head'];
 

if(empty($h_head)){
   echo "Fill up all";
}

else{
    $query="insert into `hobby` (`h_head`,`pic`,`link`) values('$h_head','$folder','$link')";
    $result=mysqli_query($conn,$query);

    if(!$result){
        die("Query Failed".mysqli_error($conn));
    }

    else{
        header('location: admin.php?add_msg=You have sucessfully added the data.');
    }
}
}

