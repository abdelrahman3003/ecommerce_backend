<?php
include "../../connect.php";
$email = filterRequest('email');
$new_password = filterRequest('New_password');
$retype_password = filterRequest('Retype_password');
$stmt = $con->prepare("SELECT * FROM `delivery` WHERE `delivery_password` = ? and `delivery_email`=? ");
$stmt->execute(array($new_password, $email));
$count = $stmt->rowCount();
if ($new_password == $retype_password) {
    if ($count > 0) {
        echo json_encode(array("status" => "RepeatPassFailure"));
    } else {
        $data = array("delivery_password" => $new_password);
        $response =   updateData("delivery", $data, "delivery_email= '$email'");
    }
} else {
    echo json_encode(array("status" => "NoMatchFailure"));
}
