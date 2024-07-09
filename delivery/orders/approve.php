<?php
include "../../connect.php";
$orderid = filterRequest("orderid");
$userid = filterRequest("userid");
$deliveryid = filterRequest("deliveryid");
$data = array(
    "orders_status" => 3,
    "orders_delivery" => $deliveryid
);
$count = updateData("orders", $data, " orders_id = $orderid AND orders_status = 2 ");
if ($count>0) {
    insertNotification("approving order", "your order : $orderid is ready on road now  ", "$userid", "users$userid", "none", "approved");
    sendGCM('Ordering', "the order has been apporoval by delivery $deliveryid ", 'services', "none", "none");
    sendGCM('Ordering', "the order has been apporoval by delivery $deliveryid ", 'delivery', "none", "none");

}