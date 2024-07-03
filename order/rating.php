<?php
include '../connect.php';
$orderid=filterRequest("orderid");
$rate =filterRequest("rate");
$comment =filterRequest("comment");
$data=array(

    "orders_rating"=>$rate,
    "orders_noterating"=>$comment
);
updateData("orders",$data,"orders_id= $orderid");
// ALTER TABLE orders
// ADD COLUMN totalprice INT AS (orders.orders_price + orders.orders_pricedelivery);