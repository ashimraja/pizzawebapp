<?php
session_start();
require('dbConnection.php');

$connresult = db_connect();
$query = "delete from orders where order_id = '".$_POST['order_id']."'";
echo $connresult->query($query);
?>
