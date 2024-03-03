<?php
include('dbknow.php');

$row = [];

if(isset($_GET['hobby_id'])){
    $id = $_GET['hobby_id'];
     
    $query = "SELECT * FROM `hobby` WHERE `id`=?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if(!$result){
        die("Query failed: " . mysqli_error($conn));
    } else {
        $row = mysqli_fetch_assoc($result);
    }
}

if(isset($_POST['update_hobby'])) {
    $idnew = $_GET['hobb_id']; 

    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "images/".$filename;
    move_uploaded_file($tempname, $folder);

    $update_query = "UPDATE `hobby` SET `h_head`=?, `pic`=?, `link`=? WHERE `id`=?";
    $update_stmt = mysqli_prepare($conn, $update_query);

    $hobby_name = $_POST['hobby_name'];
    $link = $_POST['link'];

    mysqli_stmt_bind_param($update_stmt, "sssi", $hobby_name, $folder, $link, $idnew);

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
<h1>Update Hobby</h1>
<form action="update_hobby.php?hobb_id=<?php echo $id ?>" method="post" enctype="multipart/form-data">
    <div class="modal-body">
        <div class="form-group">
            <label for="hobby_name">Hobby Name</label>
            <input type="text" name="hobby_name" class="textfield" value="<?php echo isset($row['h_head']) ? $row['h_head'] : ''; ?>">
        </div>
                
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="uploadfile" class="textfield">
        </div>

        <div class="form-group">
            <label for="link">Link</label>
            <input type="text" name="link" class="textfield" value="<?php echo isset($row['link']) ? $row['link'] : ''; ?>">
        </div>

        <input type="submit" class="btn" name="update_hobby" value="UPDATE">
    </div>    
</form>
</div>
</body>
</html>
