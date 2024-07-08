<?php
include "../connect.php";
$email = filterRequest('email');
$verifycode = $verifycode = rand(10000, 99999);
$stmt = $con->prepare("SELECT * FROM `delivery` WHERE `delivery_email` = ?");
$stmt->execute(array($email));
$count = $stmt->rowCount();
if ($count > 0) {
    $data = array("delivery_verifycode" => $verifycode);
    sendemail($email, "your verifycode to reset your password ", $verifycode);
    updateData("delivery", $data, "delivery_email= '$email'");
} else {
    printFailure("email is not found ");
}
