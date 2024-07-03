<?php
include '../connect.php';
$userid =filterRequest("userid");
getAllData("ordersview","orders_userid= $userid");
// ALTER TABLE orders
// ADD COLUMN totalprice INT AS (orders.orders_price + orders.orders_pricedelivery);