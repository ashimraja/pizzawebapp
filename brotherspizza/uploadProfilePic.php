<?php
session_start();
require('dbConnection.php');

$connresult = db_connect();
$p_name = $_FILES['profile_pic']['name'];
$p_t_name= $_FILES['profile_pic']['tmp_name'];
$p_folder="./images/users/".$p_name;
move_uploaded_file($p_t_name,$p_folder);

$query = "update users set profile_pic='".$p_name."' where u_id='".$_SESSION['uid']."';";
if($connresult->query($query)){
    echo "Changed Successfully";
    $_SESSION['profile_pic'] = $p_name;
}else{
    echo "Some Error Occured!";
}

?>