<?php
include "../connect.php";
$userid = filterRequest("userid");
$data = getAllData("cartview", "cartview.cart_userid = $userid", null, false);
$stmt = $con->prepare("SELECT SUM(itemdiscountprice) as totalprice , SUM(itemcount) as totalcount from cartview where cartview.cart_userid = $userid");
$stmt->execute();
$countprice = $stmt->fetch(PDO::FETCH_ASSOC);
if ($data['status'] == 'failure') {
    echo json_encode(array("status" => "failure"));

}
else {
    echo json_encode(array(
        "status" => "success",
        "data" => $data['data'],
        "countprice" => $countprice,
    ));
}
 


