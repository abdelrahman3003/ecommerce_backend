<?php
include '../../connect.php';
$id =filterRequest("id");
getAllData("ordersview","orders_status=4  and orders_delivery =$id");
