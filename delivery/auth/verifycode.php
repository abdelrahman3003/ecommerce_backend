<?php
include "../connect.php";
$email = filterRequest('email');
$verifycode = filterRequest('verifycode');
$stmt = $con->prepare("SELECT * FROM `delivery` WHERE `delivery_verifycode` = ? and `delivery_email`=?");
$stmt->execute(array($verifycode, $email));
$count = $stmt->rowCount();
if ($count > 0) {
    $data = array("delivery_approve" => "1");
    $response =   updateData("delivery", $data, "delivery_email= '$email'");
    if (!$response) {
        echo json_encode(array("status" => "success"));
    }
} else {
    printFailure('verfycode is incoorect');
}
