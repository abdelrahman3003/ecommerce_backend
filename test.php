
<?php
//$to = 'abdelrahmatemsah29@gmail.com';
//$title = "hi";
//$body = "hello world";
//$header = "From:support@abdelrahmantemsah30@gmail.com" . '\n' . 'CC:abdelrahman temsah';

//include 'connect.php';
//getAllData("users","1=2");
$notAuth="";
include "connect.php";
sendGCM("hi","how are you","users183","","");
echo "send";
?>