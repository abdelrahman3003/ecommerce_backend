<?php
include "../connect.php";
$username = filterRequest('username');
$email = filterRequest('email');
$phone = filterRequest('phone');
$password = filterRequest('password');
$verifycode = rand(10000, 99999);
$response = deleteData("users", "users_approve= '0'",false);
$stmt = $con->prepare("SELECT * FROM `users` WHERE `users_email` = ? or `users_phone`= ?");
$stmt->execute(array($email, $phone));
$count = $stmt->rowCount();
if ($count > 0) {
  printFailure("phone or email is already exised");
} else {
  $data = array(
    "users_name" => "$username",
    "users_email" => "$email",
    "users_phone" => "$phone",
    "users_password" => "$password",
    "users_verifycode" => "$verifycode",
  );


  insertData("users", $data);
  sendemail($email, "verifycode for your account", "your verifycode is $verifycode");
}
