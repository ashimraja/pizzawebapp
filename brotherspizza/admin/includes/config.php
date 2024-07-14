<?php
 $db_conn = mysqli_connect('localhost','root','','brotherspizza');
 if($db_conn){
    
 }
 else{
    echo "Connection Failed";
 }
 if(empty($_SESSION)){
 session_start();
 
 }
 include('functions.php');
?>