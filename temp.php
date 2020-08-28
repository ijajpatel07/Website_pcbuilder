<?php
session_start();
$len=count_chars($_SERVER['REQUEST_URI'],0)[61];
$cart=array($_REQUEST["prod0"]);
for($i=1;$i<$len;$i=$i+1){
    array_push($cart,$_REQUEST["prod$i"]);
}
$_SESSION["cart"]=$cart;
print_r($_SESSION["cart"]);
echo "<script>window.location='cart.php';</script>";
?>
