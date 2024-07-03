<?php
include "../connect.php";
$search = filterRequest("search");
getAllData("item_view1", "items_name like '%$search%' or items_name_ar like '%$search%' ");
