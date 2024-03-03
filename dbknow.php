<?php

define("HOSTNAME","localhost");
define("USERNAME","root");
define("PASSWORD","");
define("DATABASE","know_me");

$conn= mysqli_connect(HOSTNAME,USERNAME,PASSWORD,DATABASE);

if(!$conn){
    die("Connection Failed");
}

// else{echo"yess";}

?>