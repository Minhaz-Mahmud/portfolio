<?php
include('dbknow.php');

$row = [];

if(isset($_GET['profile_id'])){
    $id = $_GET['profile_id'];
     
    $query = "SELECT * FROM `profile` WHERE `id`=$id";

    $result = mysqli_query($conn, $query);

    if(!$result){
        die("Query failed: " . mysqli_error($conn));
    } else {
        $row = mysqli_fetch_assoc($result);
    }
}

if(isset($_POST['update_p'])) {
    $idnew = $_GET['p_id']; 

    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "images/".$filename;
    move_uploaded_file($tempname, $folder);

    $update_query = "UPDATE `profile` SET `pic`=?, `info`=?  WHERE `id`=?";
    $update_stmt = mysqli_prepare($conn, $update_query);

    
    $info = $_POST['info'];

    mysqli_stmt_bind_param($update_stmt, "ssi", $folder, $info, $idnew); 

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
<form action="update_profile.php?p_id=<?php echo $id ?>" method="post" enctype="multipart/form-data">


   <div class="center">
   <h1>Update Work</h1>
    <div class="modal-body">         
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="uploadfile" class="textfield">
        </div>

        <div class="form-group">
            <label for="info">Info</label>
            <input type="text" name="info" class="textfield" value="<?php echo isset($row['info']) ? $row['info'] : ''; ?>">
        </div>

        <input type="submit" name="update_p"  class="btn" value="UPDATE">
    </div>
    </div>
    
</form>
</body>
</html>
