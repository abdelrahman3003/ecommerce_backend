<?php
include "../../connect.php";
$email = filterRequest('email');
$verifycode = rand(10000, 99999);
$data = array("delivery_verifycode" => $verifycode);
updateData("delivery",$data,"delivery_email = '$email'",false);
sendemail($email, "verifycode for your account", "your verifycode is $verifycode");
echo json_encode(array("status" => "success"));