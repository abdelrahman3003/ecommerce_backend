<?php
include "../../connect.php";
$orderid = filterRequest("orderid");
$userid = filterRequest("userid");
$data = array(
    "orders_status" => 1
);
$count = updateData("orders", $data, "orders_id=$orderid and orders_status=0");
//sendGCM("approved","the order is aleardy approved ","users$userid","none","approved");
if ($count>0) {
    insertNotification("approved", "the order is aleardy approved ", "$userid", "users$userid", "none", "approved");

}