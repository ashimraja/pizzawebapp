<?php

    $conn = new mysqli("localhost", "root", "", "brotherspizza");

    if ($conn->connect_error) {
        die("Connection Error: ".mysqli_connect_error());
    } else {
        echo "Successfully connected to the database\n";
    }

    // $id = $_POST['p_id'];
    // $name = $_POST['p_name'];
    // $price = $_POST['p_price'];
    // $image = $_POST['p_image'];
    $cart = array();

    $sql = "select * from pizza";
    $result = $conn->query($sql);
    while ($row=$result->fetch_assoc()) {
        echo json_encode($row);
    }

    $conn->close();

?>

<html>
    <body>

    </body>
    <!-- <script src="./js/cart.js">
        var cart = [
            <?php
                // while ($row=$result->fetch_assoc()) {
                //     echo "{id: '".$row['p_id']."',name: '".$row['p_name']."', price: ".$row['p_price'].", image: '".$row['p_image']."'},";
                // }
                //echo $data;
            ?>
        ];
        
    </script>
    <script>console.log(cart)</script> -->
</html>