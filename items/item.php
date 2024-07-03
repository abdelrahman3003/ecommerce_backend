<?php
include "../connect.php";
$categoryId = filterRequest("categoryId");
// getAllData("item_view", "categories_id=$categoryId");


$userid = filterRequest("userid");
$stmt = $con->prepare("SELECT item_view1.*, 1 as favourite,(items_price - items_price*(items_discount/100)) as  itemdiscountprice FROM item_view1 
INNER JOIN favourites on favourites.favourites_itemsid=item_view1.items_id and favourites.favourites_usersid=$userid
WHERE categories_id = $categoryId
UNION All 
SELECT * ,  0 as favourite,(items_price - items_price*(items_discount/100)) as itemdiscountprice FROM item_view1
WHERE categories_id = $categoryId and items_id not in ( SELECT item_view1.items_id FROM item_view1
INNER JOIN favourites on favourites.favourites_itemsid=item_view1.items_id and favourites.favourites_usersid=$userid )");

$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
$count  = $stmt->rowCount();
if ($count > 0) {
    echo json_encode(array("status" => "success", "data" => $data));
} else {
    echo json_encode(array("status" => "failure"));
}

