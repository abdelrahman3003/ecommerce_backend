<?php
include '../connect.php';
$orderid =filterRequest("orderid");
getAllData("orderdetails","cart_order= $orderid");