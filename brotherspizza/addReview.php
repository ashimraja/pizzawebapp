<?php
require('dbConnection.php');

$connresult = db_connect();
session_start();
if(isset($_POST['itemid']) && isset($_SESSION['uid'])) {
    $currentDate = date('Y-m-d');
    $userid = $_SESSION['uid'];
    $itemid = $_POST['itemid'];
    $review = $_POST['review'];
    $query = "insert into reviews values('$userid', '$itemid', '$review', '$currentDate')";
    if ($connresult->query($query) === TRUE) {
        echo "Posted";
    } else {
        echo "Some error occured";
    }
}
?>