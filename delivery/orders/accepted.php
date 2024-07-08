<?php
include '../../connect.php';
$id =filterRequest("id");
getAllData("ordersview","'orders_status'=3 and 'orders_delivery' =$id");
