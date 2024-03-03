<?php
include('dbknow.php');

$row = [];

if(isset($_GET['work_id'])){
    $id = $_GET['work_id'];
     
    $query = "SELECT * FROM `know` WHERE `id`=$id";
    $result = mysqli_query($conn, $query);

    if(!$result){
        die("Query failed: " . mysqli_error($conn));
    } else {
        $row = mysqli_fetch_assoc($result);
    }
}

if(isset($_POST['update_know'])) {
    $idnew = $_GET['know_id']; 

    $update_query = "UPDATE `know` SET `icon`=?, `head`=?, `des`=? WHERE `id`=?";
    $update_stmt = mysqli_prepare($conn, $update_query);

    $icon = $_POST['icon'];
    $head = $_POST['head'];
    $des = $_POST['des'];

    mysqli_stmt_bind_param($update_stmt, "sssi", $ $icon, $head , $des, $idnew); 

    if(mysqli_stmt_execute($update_stmt)) {
        header('location: admin.php?update_msg=You have sucessfully updated the data.');
    } else {
        echo "Update failed: " . mysqli_error($conn);
    }

    mysqli_stmt_close($update_stmt);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="extra.css">
</head>
<body>
<div class="center">
<h1>Upadte Know Me</h1>
<form action="update_know.php?know_id=<?php echo $id ?>" method="post">
    <div class="modal-body">
    <div class="form-group">
            <label for="icon">Icon</label>
            <input type="text" name="icon" class="textfield" value="<?php echo $row['icon']; ?>">
        </div>
                
        <div class="form-group">
            <label for="head">Title</label>
            <input type="text" name="head" class="textfield" value="<?php echo $row['head']; ?>">
        </div>

        <div class="form-group">
            <label for="des">Description</label>
            <input type="text" name="des" class="textfield" value="<?php echo $row['des']; ?>">
        </div>

        <input type="submit" class="btn" name="update_know" value="UPDATE">
    </div>    
</form>
</div>
</body>
</html>
