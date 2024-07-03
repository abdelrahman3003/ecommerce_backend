<?php
include "../connect.php";
$email = filterRequest('email');
$new_password = filterRequest('New_password');
$retype_password = filterRequest('Retype_password');
$stmt = $con->prepare("SELECT * FROM `users` WHERE `users_password` = ? and `users_email`=? ");
$stmt->execute(array($new_password, $email));
$count = $stmt->rowCount();
if ($new_password == $retype_password) {
    if ($count > 0) {
        echo json_encode(array("status" => "RepeatPassFailure"));
    } else {
        $data = array("users_password" => $new_password);
        $response =   updateData("users", $data, "users_email= '$email'");
    }
} else {
    echo json_encode(array("status" => "NoMatchFailure"));
}
