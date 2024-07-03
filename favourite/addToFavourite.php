<?php
include "../connect.php";
$itemid = filterRequest("itemid");
$userid = filterRequest("userid");
$data = array(
    "favourites_usersid" =>  $userid,
    "favourites_itemsid" => $itemid
);
insertData("favourites", $data);
//insertData("favourites", $data);
