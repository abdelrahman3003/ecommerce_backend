<?php
include "../connect.php";
$userid = filterRequest("userid");
getAllData("notifications","notifications_userid=$userid ORDER BY notifications_id DESC");