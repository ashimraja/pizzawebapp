<?php
session_start();
require('dbConnection.php');

$connresult = db_connect();
$cart = json_decode($_POST['cart']);
$query = "";
$res = "";
foreach($cart as $item) {
    $orderId = uniqid();
    $query = "insert into orders values('".$orderId."', '".$_SESSION['uid']."', '".$item->id."', '".$item->type."', '".$item->qty."', 'not delivered')";
    if($connresult->query($query)) {
        $res = "Order Placed Successfully";
    }
}
if($res != "") {
    echo $res;
}
else {
    echo "Couldn't Place Order";
}
?>