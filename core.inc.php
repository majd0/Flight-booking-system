<?php
$servername = "localhost";
$username = "root";
$password = "root";
$db = "LT_DB";

// Check connection
if (!mysqli_connect($servername,$username,$password,$db)) {
    echo "Unsucessful connection";
} else
  $con = new mysqli($servername,$username,$password,$db);

  function isloggedin(){
    if (isset($_SESSION['name']) && !empty($_SESSION['name'])){
      return true;
    }else {
      return false;
    }
  }
  ?>
