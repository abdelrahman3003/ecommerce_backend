<?php
include "../connect.php";
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
$response = deleteData("users", "users_approve= '0'",false);
getAllData("users", "`users_email` = ? and `users_password`= ? ", array($email, $password));
