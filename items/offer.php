<?php
include "../connect.php";
$stmt=$con->prepare("SELECT  items.* ,(items.items_price - items.items_price*(items.items_discount/100))  as itemdiscountprice  from items where items.items_discount>0");
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
$count=$stmt->rowCount();
if ($count > 0) {
    echo json_encode(array("status" => "success", "data" => $data));
} else {
    echo json_encode(array("status" => "failure"));
}