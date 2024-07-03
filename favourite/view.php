<?php
include "../connect.php";
$userid = filterRequest("userid");
getAllData("myfavourite",'users_id=?',array($userid));

