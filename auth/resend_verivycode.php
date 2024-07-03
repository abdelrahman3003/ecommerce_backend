<?php
include "../connect.php";
$email = filterRequest('email');
$verifycode = rand(10000, 99999);
$data = array("users_verifycode" => $verifycode);
updateData("users",$data,"users_email = '$email'",false);
sendemail($email, "verifycode for your account", "your verifycode is $verifycode");
echo json_encode(array("status" => "success"));