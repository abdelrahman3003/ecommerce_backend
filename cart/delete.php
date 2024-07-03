<?php
include "../connect.php";
$itemid = filterRequest("itemid");
$userid = filterRequest("userid");

deleteData('cart',"cart_id=(SELECT cart_id from cart where cart_userid=$userid and cart_itemid =$itemid and cart_order=0 limit 1 )");