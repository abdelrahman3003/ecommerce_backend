<?php
$dsn = "mysql:host=fdb1034.awardspace.net;dbname=4442093_ecommerceserver";
$user = "4442093_ecommerceserver";
$pass = "dream16797346";
$option = array(
   PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES UTF8"
);
$countrowinpage = 9;
try {
   $con = new PDO($dsn, $user, $pass, $option);
   $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   include "function.php";
   if (!isset($notAuth)) {
     //  checkAuthenticate();
   }
} catch (PDOException $e) {
   echo $e->getMessage();
}
