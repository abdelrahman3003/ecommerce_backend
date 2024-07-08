<?php
include "../../connect.php";
$orderid = filterRequest("orderid");
$userid = filterRequest("userid");
$typ =filterRequest("ordertype");
if ($typ=="0") {
    $data = array(
        "orders_status" => 2
    );
  
}
else {
    $data = array(
        "orders_status" => 4
    );
}
$count = updateData("orders", $data, "orders_id=$orderid and orders_status=1");
//sendGCM("approved","the order is aleardy approved ","users$userid","none","approved");
if ($count>0) {
    if ($typ=="0") {
        sendGCM('Ordering', 'an order that is waiting , now is ready to retrieve', 'delivery', "none", "none");
    }
    insertNotification("approved", "the order is aleardy approved ", "$userid", "users$userid", "none", "approved");
   
}