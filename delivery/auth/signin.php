<?php
include "../../connect.php";
$email = filterRequest('email');
$password = filterRequest('password');
$response = deleteData("delivery", "delivery_approve= '0'",false);
getAllData("delivery", "`delivery_email` = ? and `delivery_password`= ? ", array($email, $password));
