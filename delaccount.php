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
	$sql=$con->query("delete from customer where userid='{$_SESSION['userid']}'");
	$sql2=$con->query("delete from login where userid='{$_SESSION['userid']}'");
	session_unset();
    session_destroy();
echo "<script>window.location='login.php';</script>";
?>