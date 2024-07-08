<?php
include "../../connect.php";
$orderid = filterRequest("orderid");
$userid = filterRequest("userid");
$deliveryid = filterRequest("deliveryid");
$data = array(
    "orders_status" => 3
    "orders_delivery" => $deliveryid
);
$count = updateData("orders", $data, "orders_id=$orderid and orders_status=2");
//sendGCM("approved","the order is aleardy approved ","users$userid","none","approved");
if ($count>0) {
    insertNotification("approving order", "your order : $orderid is ready on road now  ", "$userid", "users$userid", "none", "approved");
    sendGCM('Ordering', "the order has been apporoval by delivery $deliveryid ", 'services', "none", "none");
    sendGCM('Ordering', "the order has been apporoval by delivery $deliveryid ", 'delivery', "none", "none");

}