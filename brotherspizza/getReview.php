<?php
session_start();
require('dbConnection.php');

$connresult = db_connect();

// header('Content-Type: application/json');

function getReview($id, $connresult) {
    $query = "select * from reviews where item_id = '$id';";
    $result = $connresult->query($query);

    $response = array();

    while($row = $result->fetch_assoc()) {
        $review = new stdClass();
        $review->review = $row['review'];
        $review->date = $row['date'];
        $query = "select * from users where u_id = '".$row['user_id']."';";
        $user = $connresult->query($query);
        $userData = $user->fetch_assoc();
        $review->name = $userData['firstname']." ".$userData['lastname'];
        $review->profile_pic = $userData['profile_pic'];
        array_push($response, $review);
    }
    return json_encode($response);
}

echo getReview($_POST['itemid'], $connresult);
?>