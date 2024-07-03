<?php
include "../connect.php";
$favouriteId = filterRequest("favouriteId");

deleteData('favourites',"favourites_id=$favouriteId");


