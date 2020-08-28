<?php 
    session_start();
    $server     = "localhost";
    $username   = "root";
    $password   = "";
    $database   = "project";

   $con = mysqli_connect($server, $username, $password, $database);
    $name=$_POST['name'];
    $contact=$_POST['contact'];
    $address=$_POST['address'];
    
   if(!$con){
      die("Error : " . $con->connect_error);
   }
       $result=$con->query("update customer set name='$name', contact='$contact', address='$address' where userid='{$_SESSION['userid']}'");
       ?>
       <script type="text/javascript">
           if(confirm("Profile updated!")){
               window.location = "profile.php";
           }
       </script> 