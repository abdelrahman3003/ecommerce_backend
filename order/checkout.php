<?php
include '../connect.php';
$userid              =    filterRequest("userid");
$addressid           =    filterRequest("addressid");
$orderprice          =    filterRequest("orderprice");
$orderpricedelivery  =    filterRequest("orderpricedelivery");
$ordercoupon         =    filterRequest("ordercoupon");
$ordertype           =    filterRequest("ordertype");
$orderspaymentmethod =    filterRequest("orderspaymentmethod");
if ($ordertype == "0") {
    $orderpricedelivery = 0;
}
$orderprice = $orderprice + $orderpricedelivery;


$data = array(
    "orders_userid" => $userid,
    "orders_address" => $addressid,
    "orders_price" => $orderprice,
    "orders_coupon" => $ordercoupon,
    "orders_type" => $ordertype,
    "orders_paymentmethod" => $orderspaymentmethod,
    "orders_pricedelivery" => $orderpricedelivery,
);
$count = insertData("orders", $data, false);
$stmt = $con->prepare("UPDATE coupon set coupon.coupon_count=coupon.coupon_count -1 where coupon_name ='$ordercoupon';");
$stmt->execute();
if ($count > 0) {
    $stmt = $con->prepare("SELECT max(orders_id) from orders");
    $stmt->execute();
    $max = $stmt->fetchColumn();
    $count1 = $stmt->rowCount();
    $data = array(
        "cart_order" => $max,
    );
    updateData("cart", $data, " cart_order=0 ");
}
