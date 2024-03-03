<?php
include('dbknow.php');

$row = []; 

if(isset($_GET['admin_id'])){
    $id = $_GET['admin_id'];
     
    $query = "SELECT * FROM `admin` WHERE `id`=?";
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

if(isset($_POST['update_admin'])) {
    $idnew = $_GET['u_id']; 

    $update_query = "UPDATE `admin` SET `username`=?, `pass`=? WHERE `id`=?";
    $update_stmt = mysqli_prepare($conn, $update_query);

    $user = $_POST['username'];
    $pass = $_POST['pass'];

    mysqli_stmt_bind_param($update_stmt, "ssi", $user, $pass, $idnew); 

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
<h1>Update Admin</h1>
<form action="update_admin.php?u_id=<?php echo htmlspecialchars($id); ?>" method="post">
    <div class="modal-body">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" class="textfield" value="<?php echo isset($row['username']) ? htmlspecialchars($row['username']) : ''; ?>">
        </div>
                
        <div class="form-group">
            <label for="pass">Password</label>
            <input type="text" name="pass" class="textfield" value="<?php echo isset($row['pass']) ? htmlspecialchars($row['pass']) : ''; ?>">
        </div>

        <input type="submit" class="btn" name="update_admin" value="UPDATE">
    </div>    
</form>
</div>
</body>
</html>
