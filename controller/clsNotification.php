<?php 
header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');
require ("..\config.php");
// require ("classBind.php");
// $objClassBind = new clsClassBind;
#$result = $objClassBind->getNotification();
// print_r($result); exit;
$time = date('r');
echo "data: The server time is: {$time}\n\n";
flush();
?>