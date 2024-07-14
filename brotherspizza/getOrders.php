<?php
session_start();
require('dbConnection.php');

$connresult = db_connect();

// header('Content-Type: application/json');

function getOrders($connresult) {
    $query = "select * from orders where user_id = '".$_SESSION['uid']."';";
    $result = $connresult->query($query);

    $response = array();

    while($row = $result->fetch_assoc()) {
        $order = new stdClass();
        $order->order_id = $row['order_id'];
        $order->qty = $row['qty'];
        $order->order_status = $row['order_status'];
        if ($row['item_type'] == 'pizza') {
            $query = "select * from pizza where p_id = '".$row['item_id']."'";
            $res = $connresult->query($query);
            $item = new stdClass();
            $row1 = $res->fetch_assoc();
            $item->name = $row1['p_name'];
            $item->price = $row1['p_price'];
            $item->image = $row1['p_image'];
            $order->item = $item;
        }
        else {
            $query = "select * from drinks where d_id = '".$row['item_id']."'";
            $res = $connresult->query($query);
            $item = new stdClass();
            $row1 = $res->fetch_assoc();
            $item->name = $row1['d_name'];
            $item->price = $row1['d_price'];
            $item->image = $row1['d_image'];
            $order->item = $item;
        }
        array_push($response, $order);
    }
    return json_encode($response);
}

echo getOrders($connresult);
?>