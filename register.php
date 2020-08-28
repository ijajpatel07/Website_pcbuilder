<?php
   $server     = "localhost";
   $username   = "root";
   $password   = "";
   $database   = "project";

   $con = mysqli_connect($server, $username, $password, $database);

   if(!$con){
      die("Error : " . $con->connect_error);
   }
        $name=$_POST["name"];
        $contact=$_POST["contact"];
        $userid=$_POST["userid"];
        $password=$_POST["password"];
        $confpassword=$_POST["confpassword"];
        
       
            $result=$con->query("insert into login(userid,password) values('$userid','$password')");
            $result2=$con->query("insert into customer(name,contact,address,userid) values('$name','$contact','','$userid')");  
echo "<script>window.location='login.php';</script>";
    
   ?>