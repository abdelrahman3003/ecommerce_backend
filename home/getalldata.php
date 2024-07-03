
<?php
include "../connect.php";
$alldata = array();
$categories = getAllData("categories", null, null, false);
$items = getAllData("topselling", null, null, false);
$textdiscount = getAllData("textdiscount", null, null, false);
$alldata['status']='success';
$alldata['categories']=$categories['data'];
$alldata['topselling']=$items['data'];
$alldata['textdiscount']=$textdiscount['data'];
echo json_encode($alldata);