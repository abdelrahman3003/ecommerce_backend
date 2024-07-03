<?php
include "../connect.php";
$email = filterRequest('email');
$verifycode = $verifycode = rand(10000, 99999);
$stmt = $con->prepare("SELECT * FROM `users` WHERE `users_email` = ?");
$stmt->execute(array($email));
$count = $stmt->rowCount();
if ($count > 0) {
    $data = array("users_verifycode" => $verifycode);
    sendemail($email, "your verifycode to reset your password ", $verifycode);
    updateData("users", $data, "users_email= '$email'");
} else {
    printFailure("email is not found ");
}
