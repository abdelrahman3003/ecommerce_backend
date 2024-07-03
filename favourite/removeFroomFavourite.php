<?php
include "../connect.php";
$itemid = filterRequest("itemid");
$userid = filterRequest("userid");

deleteData('favourites', "favourites_itemsid=$itemid and favourites_usersid=$userid");
