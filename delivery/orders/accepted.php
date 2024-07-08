<?php
include '../../connect.php';
$id =filterRequest("id");
getAllData("ordersview","1 = 1 and  orders_status=3 and orders_delivery =$id");
