<?php
    function db_connect() {
        $conn = new mysqli("localhost", "root", "", "brotherspizza");
        return $conn;
    }  
?>