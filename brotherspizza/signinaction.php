<?php
require('dbConnection.php');

$connresult = db_connect();


    $sql = "select * from users where email = '".$_POST['email']."'";
    $result = $connresult->query($sql);

    while ($row=$result->fetch_assoc()) {
        $uid =  $row['u_id'];
        $post = $row['u_post'];
        $password =  $row['password'];
        $fname =  $row['firstname'];
        $lname =  $row['lastname'];
        $email = $row['email'];
    }

    if($_POST['password'] == $password) {
        session_start();
        $_SESSION['id'] = $uid.$post;
        $_SESSION['firstname'] = $fname;
        $_SESSION['lastname'] = $lname;
        $_SESSION['email'] = $email;
        $_SESSION['post'] = $post;
        if ($post == 'admin') {
            header ('Location: admin.php');
        }
        else {
            header ('Location: index.php');
        }
        
    }
    else {
        echo 'incorrect password';
        header ('Location: index.php');
    }
?>