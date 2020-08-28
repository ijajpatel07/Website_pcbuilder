<?php 
session_start();
require_once('config.php');
$server     = "localhost";
    $username   = "root";
    $password   = "";
    $database   = "project";

$con = mysqli_connect($server, $username, $password, $database);
 $userid=$_SESSION['userid']; 
if(!$con){
   die("Error : " . $con->connect_error);
} 
$i=0;
$amt=0;
while(isset($_GET["prod$i"])){
  $pdt_name=$_GET["prod$i"];
  $price=$_GET["price$i"];
  $amt=$amt+$price;
  $result=$con->query("insert into invoice(userid,pdt_name,price) values('$userid','$pdt_name','$price')");
  $i++;
}
$amt=(int)($amt*112.5);
$amt=$amt+50;
?>
<html>
  <head>
    <title>Payment gateway</title>
    <meta name="viewport" content="width=device-width">
    <style>
      .razorpay-payment-button {
        color: #ffffff !important;
        background-color: #7266ba;
        border-color: #7266ba;
        font-size: 14px;
        padding: 10px;
      }
    </style>
  </head>
  <body>
    <form action="charge.php" method="POST">
    <!-- Note that the amount is in paise = 50 INR -->
    <script
        src="https://checkout.razorpay.com/v1/checkout.js"
        data-key="<?php echo $razor_api_key; ?>"
        data-amount="<?php echo $amt?>";
        data-buttontext="Pay with Razorpay"
        data-name="PC Builder"
        data-description="Online PC Assembly"
        data-image="https://your-awesome-site.com/your_logo.jpg"
        data-prefill.name="Atharva Mitragotri"
        data-prefill.email="support@razorpay.com"
        data-theme.color="#F37254"
    ></script>
    <input type="hidden" value="Hidden Element" name="hidden">
    </form>
  </body>
</html>