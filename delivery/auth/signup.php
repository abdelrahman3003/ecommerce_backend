<?php
include "../connect.php";
$username = filterRequest('username');
$email = filterRequest('email');
$phone = filterRequest('phone');
$password = filterRequest('password');
$verifycode = rand(10000, 99999);
$response = deleteData("delivery", "delivery_approve= '0'",false);
$stmt = $con->prepare("SELECT * FROM `delivery` WHERE `delivery_email` = ? or `delivery_phone`= ?");
$stmt->execute(array($email, $phone));
$count = $stmt->rowCount();
if ($count > 0) {
  printFailure("phone or email is already exised");
} else {
  $data = array(
    "delivery_name" => "$username",
    "delivery_email" => "$email",
    "delivery_phone" => "$phone",
    "delivery_password" => "$password",
    "delivery_verifycode" => "$verifycode",
  );


  insertData("users", $data);
  sendemail($email, "verifycode for your account", "your verifycode is $verifycode");
}
