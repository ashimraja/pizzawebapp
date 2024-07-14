<?php
    session_start();
    $id = $_REQUEST['id'];
    $id = json_encode($id);
    $id = substr($id, 1, -1);

    $qty = $_REQUEST['qty'];
    $qty = json_encode($qty);
    $qty = substr($qty, 1, -1);

    $act = $_REQUEST['act'];
    $act = json_encode($act);
    $act = substr($act, 1, -1);

    $type = $_REQUEST['type'];
    $type = json_encode($type);
    $type = substr($type, 1, -1);
    //$_SESSION['act'] = $qty;

	require('dbConnection.php');

	$connresult = db_connect();
    if ($act == "add") {
        $sql = "insert into cart values('".$id."','".$qty."','".$_SESSION['uid']."', '".$type."')";
        if ($connresult->query($sql) === TRUE) {
            echo "A record is inserted successfully";
        } else {
            echo "Error while executing query ".$connresult->error;
        }
    }
    else if ($act == "remove") {
        $sql = "delete from cart where i_id = '".$id."' and u_id = '".$_SESSION['uid']."'";
        if ($connresult->query($sql) === TRUE) {
            echo "A record is deleted successfully";
        } else {
            echo "Error while executing query ".$connresult->error;
        }
    }
    else if ($act == "update") {
        $sql = "update cart set qty = '".$qty."' where i_id = '".$id."' and u_id = '".$_SESSION['uid']."'";
        if ($connresult->query($sql) === TRUE) {
            echo "A record is updated successfully";
        } else {
            echo "Error while executing query ".$connresult->error;
        }
    }

?>