<html>
    <body>
        <form action="" method="post">
            <span>id</span>
            <input type="text" name="p_id"><br>
            <span>name</span>
            <input type="text" name="p_name"><br>
            <span>price</span>
            <input type="number" name="p_price"><br>
            <span>image</span>
            <input type="text" name="p_image"><br>
            <input type="submit" name="submit">
        </form>
    </body>
</html>

<?php

session_start();

if (!isset($_SESSION['id']) || $_SESSION['post'] != 'admin') {
    header('Location: index.php');
}

if(isset($_POST['submit'])) {
    $conn = new mysqli("localhost", "root", "", "brotherspizza");

    if ($conn->connect_error) {
        die("Connection Error: ".mysqli_connect_error());
    } else {
        echo "Successfully connected to the database\n";
    }

    $id = $_POST['p_id'];
    $name = $_POST['p_name'];
    // $type = $_POST['type'];
    $price = $_POST['p_price'];
    $image = $_POST['p_image'];

    


    $sql = "insert into drinks values('".$id."','".$name."','".$price."','".$image."')";

    if ($conn->query($sql) === TRUE) {
        echo "A record is inserted successfully";
    } else {
        echo "Error while executing query ".$conn->error;
    }
    $conn->close();
}

?>