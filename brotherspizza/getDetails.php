<?php
require('dbConnection.php');

$connresult = db_connect();

header('Content-Type: application/json');

function getItemDetails($id, $connresult) {
    $res = "";
    $name = "";
    $price = "";
    $type = "";
    $image = "";
    if(str_contains($id, 'cp') || str_contains($id, 'vp')) {
        $res = $connresult->query("select * from pizza where p_id = '$id'");
        $name = "p_name";
        $price = "p_price";
        $type = "p_type";
        $image = "p_image";
    }
    else {
        $res = $res = $connresult->query("select * from drinks where d_id = '$id'"); 
        $name = "d_name";
        $price = "d_price";
        $type = "d_name";
        $image = "d_image";   
    }
    $item = $res->fetch_assoc();
    $response = new stdClass();
    $response->name = $item[$name];
    $response->price = $item[$price];
    if(str_contains($id, 'cp') || str_contains($id, 'vp')) {
        $response->type = $item[$type];
    }
    else {
        $response->type = "";
    }
    $response->image = $item[$image];
    return json_encode($response);
}

echo getItemDetails($_POST['id'], $connresult);
?>