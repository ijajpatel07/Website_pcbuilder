<?php
    session_start();
    $server     = "localhost";
    $username   = "root";
    $password   = "";
    $database   = "project";
   $con = mysqli_connect($server, $username, $password, $database);

   if(!$con){
      die("Error : " . $con->connect_error);
   }
   
?>