<?php
include "../connect.php";
$email = filterRequest('email');
$verifycode = filterRequest('verifycode');
$stmt = $con->prepare("SELECT * FROM `users` WHERE `users_verifycode` = ? and `users_email`=?");
$stmt->execute(array($verifycode, $email));
$count = $stmt->rowCount();
if ($count > 0) {
    $data = array("users_approve" => "1");
    $response =   updateData("users", $data, "users_email= '$email'");
    if (!$response) {
        echo json_encode(array("status" => "success"));
    }
} else {
    printFailure('verfycode is incoorect');
}
