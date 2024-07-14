<?php 
function get_pizza()
{
    global $db_conn;
    $sql = "SELECT * FROM pizza";
    $query = mysqli_query($db_conn,$sql);
    return $query; 
}
function get_drinks()
{
    global $db_conn;
    $sql = "SELECT * FROM drinks";
    $query = mysqli_query($db_conn,$sql);
    return $query; 
}
function get_User()
{
    global $db_conn;
    $sql = "SELECT * FROM users";
    $query = mysqli_query($db_conn,$sql);
    return $query; 
}
function getaUser($u_id)
{
    global $db_conn;
    $sql = "SELECT * FROM users WHERE u_id='$u_id'";
    $query = mysqli_query($db_conn,$sql);
    // Check if query was successful
    if ($query) {
        // Fetch user data from the result set
        $user = mysqli_fetch_object($query);
        return $user;
    } else {
        // Handle query error
        echo "Error: " . mysqli_error($db_conn);
        return false;
    } 
}
function getTotalUsers() {

    // Query to get the total number of orders
    global $db_conn;
    $sql = "SELECT COUNT(*) AS total_users FROM users";
    $result = $db_conn->query($sql);

    // Check if query was successful
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row["total_users"];
    } else {
        return 0;
    }
}
function getTotalPizza() {

    // Query to get the total number of orders
    global $db_conn;
    $sql = "SELECT COUNT(*) AS total_pizza FROM pizza";
    $result = $db_conn->query($sql);

    // Check if query was successful
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row["total_pizza"];
    } else {
        return 0;
    }
}
function getTotalDrinks() {

    // Query to get the total number of orders
    global $db_conn;
    $sql = "SELECT COUNT(*) AS total_drinks FROM drinks";
    $result = $db_conn->query($sql);

    // Check if query was successful
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row["total_drinks"];
    } else {
        return 0;
    }
}
function getTotalOrders() {

    // Query to get the total number of orders
    global $db_conn;
    $sql = "SELECT COUNT(*) AS total_orders FROM orders";
    $result = $db_conn->query($sql);

    // Check if query was successful
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row["total_orders"];
    } else {
        return 0;
    }
}
function getCompletedOrders() {

    // Query to get the total number of orders
    global $db_conn;
    $sql = "SELECT COUNT(*) AS total_orders FROM orders WHERE order_status='delivered'";
    $result = $db_conn->query($sql);

    // Check if query was successful
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row["total_orders"];
    } else {
        return 0;
    }
}
function getToDeliver(){
    global $db_conn;
    $sql = "SELECT * FROM orders WHERE order_status='not delivered'";
    $query = mysqli_query($db_conn,$sql);
    return $query; 
}
function getDelivered(){
    global $db_conn;
    $sql = "SELECT * FROM orders WHERE order_status='delivered'";
    $query = mysqli_query($db_conn,$sql);
    return $query; 
}
function getItem($id,$type){
    global $db_conn;
    if($type=="pizza"){
        $sql = "SELECT * FROM pizza WHERE p_id='$id'";
    }
    else{
        $sql = "SELECT * FROM drinks WHERE d_id='$id'";
    }
    
    $query = mysqli_query($db_conn,$sql);
    if ($query) {
        // Fetch user data from the result set
        $user = mysqli_fetch_object($query);
        return $user;
    } else {
        // Handle query error
        echo "Error: " . mysqli_error($db_conn);
        return false;
    }  
}
?>