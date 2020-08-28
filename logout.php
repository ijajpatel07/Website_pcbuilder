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
if(isset($_POST['logout'])){
	
	session_unset();
	session_destroy();
echo "<script>window.location='login.php';</script>";
}
else{
	
	?>
	<script>
		if(confirm("Are you sure you want to delete your account?")){
			window.location="delaccount.php";
		}
		else{
			window.location="profile.php";
		}
	</script>
	<?php
}
?>