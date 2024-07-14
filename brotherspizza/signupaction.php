<?php
require('dbConnection.php');

$connresult = db_connect();

    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $uid = 'cl'.rand(10, 10000);


    $sql = "insert into users values('".$uid."','".$fname."','".$lname."','".$email."','".$password."','client')";
    if ($connresult->query($sql) === TRUE) {
        echo "A record is inserted successfully";
    } else {
        echo "Error while executing query ".$connresult->error;
    }

    $connresult->close();
    
    header('Location: sign-in.php');
?>