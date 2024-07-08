<?php
include "../../connect.php";
$email = filterRequest('email');
$password = filterRequest('password');
// $stmt = $con->prepare("SELECT * FROM `users` WHERE `users_email` = ? and `users_password`= ?");
// $stmt->execute(array($email, $password));
// $count = $stmt->rowCount();

// if ($count > 0) {
//     echo json_encode(array("status" => "success"));
// } else {
//     printFailure("login failed");
// }
$response = deleteData("delivery", "delivery_approve= '0'",false);
getAllData("delivery", "`delivery_email` = ? and `delivery_password`= ? ", array($email, $password));
