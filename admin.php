<?php
include('dbknow.php');?>

<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="table.css">
</head>
<body>

<?php
     if(isset($_GET['add_msg'])){
     $dta=$_GET['add_msg'];
      echo '<script type="text/javascript">
      window.onload = function () { alert("'.$dta.'"); }
    </script>';
     }

    ?>

<?php
     if(isset($_GET['update_msg'])){
     $dta=$_GET['update_msg'];
      echo '<script type="text/javascript">
      window.onload = function () { alert("'.$dta.'"); }
    </script>';
     }

    ?>

<?php
     if(isset($_GET['dlt_msg'])){
     $dta=$_GET['dlt_msg'];
      echo '<script type="text/javascript">
      window.onload = function () { alert("'.$dta.'"); }
    </script>';
     }

    ?>



<?php
$userProfile=$_SESSION['user_name'];
if($userProfile==true){

}

else{
    header('location:login.php');
}

?>

<!-- ----------------------------------------------------------------------from here---------------------------------------------------------- -->

<!-- ========================================================================profile========================================================-->
<div class="admin">
<h1>PROFILE SECTION</h1>

<?php
$show_query="SELECT * from profile";
$show=mysqli_query($conn,$show_query);
$count=mysqli_num_rows($show);

if($count>0){
  ?> 

 
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Image</th>
          <th>Info</th>
          <th>Action</th>

        </tr>
      </thead>

<?php
    while($row=mysqli_fetch_assoc($show)){
        ?>

<tbody>
<tr>
            <td><?php echo $row['id']; ?></td>
            <td><img src="<?php echo $row['pic']; ?>" alt="img" height="100px" width="100px"></td>
            <td><?php echo $row['info']; ?></td>
            <td>
              <a href="update_profile.php?profile_id=<?php echo $row['id']; ?>" >Update</a></td>
                    
        </tr>
      </tbody>
        
        <?php

    }

    ?> 
    
    </table>
    </div>
    <?php
}
else echo "No data in database";
  
     
    ?>



<!-- ========================================================================work=========================================================== -->
<div class="admin">
<h1>WORK SECTION</h1>

<?php
$show_query="SELECT * from work";
$show=mysqli_query($conn,$show_query);
$count=mysqli_num_rows($show);

if($count>0){
  ?> 

 
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Header</th>
          <th>Image</th>
          <th>Description</th>
          <th>Action</th>
        </tr>
      </thead>

<?php
    while($row=mysqli_fetch_assoc($show)){
        ?>

<tbody>
<tr>


            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['w_head']; ?></td>
            <td><img src="<?php echo $row['pic']; ?>" alt="img" height="100px" width="100px"></td>
            <td><?php echo $row['description']; ?></td>
            <td><a href="add_work.php?work_id=<?php echo $row['id']; ?>" >Insert</a>||
              <a href="update_work.php?work_id=<?php echo $row['id']; ?>" >Update</a> ||
             <a href="delete.php?work_id=<?php echo $row['id']; ?>" >Delete</a></td>||
                    
        </tr>
      </tbody>
        
        <?php

    }

    ?> 
    
    </table>
    </div>
    <?php
}
else echo "No data in database";
  
     
    ?>







<!-- ======================================================     know me    ====================================================================================== -->
<div class="admin">
<h1>KNOW ME SECTION</h1>
    
<?php
$show_query="SELECT * from know";
$show=mysqli_query($conn,$show_query);
$count=mysqli_num_rows($show);

if($count>0){
  ?> 

    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Icon</th>
          <th>Title</th>
          <th>Description</th>
          <th>Action</th>
        </tr>
      </thead>

<?php
    while($row=mysqli_fetch_assoc($show)){
        ?>

<tbody>
<tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['icon']; ?></td>
            <td><?php echo $row['head']; ?></td>
            <td><?php echo $row['des']; ?></td>
            <td><a href="add_know.php?work_id=<?php echo $row['id']; ?>" >Insert</a>||
              <a href="update_know.php?work_id=<?php echo $row['id']; ?>" >Update</a> ||
             <a href="delete.php?know_id=<?php echo $row['id']; ?>" >Delete</a></td>||
                    
        </tr>
      </tbody>
        
        <?php

    }

    ?> 
    

    </table>
    </div>
    <?php
}
else echo "No data in database";
  
     
    ?>



<!-- ==========================================================Hobby============================================================================ -->

<!-- ======================================================         ====================================================================================== -->

<div class="admin">
<h1>HOBBY SECTION</h1>
    
<?php
$show_query="SELECT * from hobby";
$show=mysqli_query($conn,$show_query);
$count=mysqli_num_rows($show);

if($count>0){
  ?> 
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Pic</th>
          <th>Link</th>
          <th>Action</th>
        </tr>
      </thead>

<?php
    while($row=mysqli_fetch_assoc($show)){
        ?>

<tbody>
<tr>

             <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['h_head']; ?></td>
            <td><img src="<?php echo $row['pic']; ?>" alt="img" height="100px" width="100px"></td>
            <td><?php echo $row['link']; ?></td>
            <td><a href="add_hobby.php?hobby_id=<?php echo $row['id']; ?>" >Insert</a>||
              <a href="update_hobby.php?hobby_id=<?php echo $row['id']; ?>" >Update</a> ||
             <a href="delete.php?hobby_id=<?php echo $row['id']; ?>" >Delete</a></td>||
                    
        </tr>
      </tbody>
        
        <?php

    }

    ?> 
    

    </table>
    </div>
    <?php
}
else echo "No data in database";
  
     
    ?>


<!-- ======================================================= ADMIN TABLE =================================================================== -->


<div class="admin">
<h1>ADMIN TABLE</h1>
    <?php
    $show_query="SELECT * from admin";
    $show=mysqli_query($conn,$show_query);
    $count=mysqli_num_rows($show);
    
    if($count>0){
      ?> 
         <table>
          <thead>
            <tr>
              <th>ID</th>
              <th>Username</th>
              <th>Password</th>
              <th>Action</th>
            </tr>
          </thead>
    
    <?php
        while($row=mysqli_fetch_assoc($show)){
            ?>
    
    <tbody>
    <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['username']; ?></td>
            <td><?php echo $row['pass']; ?></td>
            <td><a href="add_admin.php?admin_id=<?php echo $row['id']; ?>" >Insert</a>||
              <a href="update_admin.php?admin_id=<?php echo $row['id']; ?>" >Update</a> ||
             <a href="delete.php?admin_id=<?php echo $row['id']; ?>" >Delete</a></td>||
                    
        </tr>
          </tbody>
            
            <?php
    
        }
    
        ?> 
        
    
        </table>
        </div>
        <?php
    }
    else echo "No data in database";
      
         
        ?>

        <!-- ==========================================================Contact============================================================================ -->

<!-- ======================================================         ====================================================================================== -->

<div class="admin">
<h1>CONTACT SECTION</h1>
    
<?php
$show_query="SELECT * from contact";
$show=mysqli_query($conn,$show_query);
$count=mysqli_num_rows($show);

if($count>0){
  ?> 
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>Message</th>
          <th>Action</th>
        </tr>
      </thead>

<?php
    while($row=mysqli_fetch_assoc($show)){
        ?>

<tbody>
<tr>

             <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['email']; ?></td> 
            <td><?php echo $row['message']; ?></td>
            <td>
             <a href="delete.php?contact_id=<?php echo $row['id']; ?>" >Delete</a></td>
                    
        </tr>
      </tbody>
        
        <?php

    }

    ?> 
    

    </table>
    </div>
    <?php
}
else echo "No data in database";
  
     
    ?>


<div class="logout-btn-container">
    <form action="logout.php" method="post">
        <input type="submit" class="logout-btn" value="LOGOUT">
    </form>
</div>

</body>
</html>

