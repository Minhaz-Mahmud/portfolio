<?php 
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login_style.css">
    <title>Login</title>
</head>
<body>

  <form action="#" method="POST" autocomplete="off">
     <div class="center">
          <h1>Login</h1>
          <div class="form">
            <input type="text" name="username" class="textfield" placeholder="Username" >
            <input type="password" name="password" class="textfield" placeholder="Password" >
        <input type="submit" name="login" value="Login" class="btn">


          </div>
     </div>

    </form>
</body>
</html>


<?php
include('dbc.php');

if(isset($_POST['login'])){
   $username= $_POST['username'];
   $pwd= $_POST['password'];

   $query="select * from `students` where email='$username'  && password ='$pwd'";
   $data=mysqli_query($connection,$query);
   $total=mysqli_num_rows($data);
//echo $total;
  if($total==1){

    $_SESSION['user_name']=$username;
    header('location:admin.php');
  }

  else{
    echo"Login Failed";
  }

}

?>