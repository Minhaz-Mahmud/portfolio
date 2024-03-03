<?php
include('dbknow.php');

$row = [];

if(isset($_GET['work_id'])){
    $id = $_GET['work_id'];
     
    $query = "SELECT * FROM `work` WHERE `id`=$id";

    $result = mysqli_query($conn, $query);

    if(!$result){
        die("Query failed: " . mysqli_error($conn));
    } else {
        $row = mysqli_fetch_assoc($result);
    }
}

if(isset($_POST['update_work'])) {
    $idnew = $_GET['work_id']; 

    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "images/".$filename;
    move_uploaded_file($tempname, $folder);

    $update_query = "UPDATE `work` SET `w_head`=?, `pic`=?, `description`=? WHERE `id`=?";
    $update_stmt = mysqli_prepare($conn, $update_query);

    $work_name = $_POST['work_name'];
    $des = $_POST['des'];

    mysqli_stmt_bind_param($update_stmt, "sssi", $work_name, $folder, $des, $idnew); 

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
<form action="update_work.php?work_id=<?php echo $id ?>" method="post" enctype="multipart/form-data">


   <div class="center">
   <h1>Update Work</h1>
    <div class="modal-body">
        <div class="form-group">
            <label for="h_work">Work Name</label>
            <input type="text" name="work_name" class="textfield" value="<?php echo isset($row['w_head']) ? $row['w_head'] : ''; ?>">
        </div>
                
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="uploadfile" class="textfield">
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" name="des" class="textfield" value="<?php echo isset($row['description']) ? $row['description'] : ''; ?>">
        </div>

        <input type="submit" name="update_work"  class="btn" value="UPDATE">
    </div>
    </div>
    
</form>
</body>
</html>
