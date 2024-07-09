<?php
include "../../connect.php";
$orderid = filterRequest("orderid");
$userid = filterRequest("userid");
$data = array(
    "orders_status" => 4
);
$count = updateData("orders", $data, "orders_id=$orderid and orders_status=3");
//sendGCM("approved","the order is aleardy approved ","users$userid","none","approved");
if ($count>0) {
    insertNotification("approving order", "your order : $orderid is ready on road now  ", "$userid", "users$userid", "none", "approved");
    sendGCM('warning', 'the order is deliverd to customer', 'services', "none", "none");

}