<?php
include "../connect.php";
$userid = filterRequest("userid");
$itemid = filterRequest("itemid");
$stmt = $con->prepare("SELECT COUNT(cart.cart_id) as countitem from cart WHERE cart_userid=$userid and cart_itemid=$itemid and cart_order=0");
$stmt->execute();
$data = $stmt->fetchColumn();
$count = $stmt->rowCount();
if ($count > 0) {
    echo json_encode(array("status" => "success", "data" => $data));
} else {
    echo json_encode(array("status" => "failure"));
}
