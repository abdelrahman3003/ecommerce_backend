<?php
include "../connect.php";
$couponname = filterRequest("couponname");
$userid = filterRequest("userid");
$now = date("Y-m-d H:i:s");
$stmt = $con->prepare("SELECT * FROM `orders` WHERE `orders_coupon` ='$couponname' and orders_userid=$userid");
$stmt->execute();
 $count = $stmt->rowCount();
// $stmt = $con->prepare("SELECT * FROM coupon JOIN orders on orders.orders_coupon=coupon_id and coupon_name='$couponname' and orders.orders_userid=$userid and coupon_expiredate>'$now' and coupon_count> 0 ");
// $stmt->execute();
// $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
// $count = $stmt->rowCount();
// if ($count > 0) {
//     echo json_encode(array("status" => "success", "data" => $data));
// } else {
//     echo json_encode(array("status" => "failure"));
// }
if ($count>0) {
    echo json_encode(array("status" => "failure"));
}
else {
    getAllData("coupon", "coupon_userid=$userid and  coupon_name='$couponname' and coupon_expiredate>'$now' and coupon_count> 0  ");
}
