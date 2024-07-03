<?php
include "../connect.php";
$itemid = filterRequest("itemid");
$userid = filterRequest("userid");

$data = array(
    "cart_userid" =>  $userid,
    "cart_itemid" => $itemid
);
insertData("cart", $data);
