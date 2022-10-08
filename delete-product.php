<?php

include('database.php');

error_log("set product::id " . $_POST['product_id']);


//check post variable is set with data
$product_id = (int)$_POST['product_id'] ?? null;


if (!is_null($product_id)) {
    error_log("Variables set");

    $sql = "DELETE FROM clothes where id='$product_id'";
    error_log('sql: ' . $sql);

    $result = $conn->query($sql);
    echo json_encode(array('status' => $result));

} else {
    echo json_encode(array('status' => 'php error'));
}

//finished so close the db connection
$conn->close();