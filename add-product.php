<?php

include('database.php');

error_log("set product::name " . $_POST['product_name']);
error_log("set product::price " . $_POST['product_price']);
error_log("set product::image " . $_POST['product_image']);

//check post variable is set with data
if (isset($_POST['product_name'])) {
    $product_name = $_POST['product_name'];

} else {
    $product_name = null;
}

if (isset($_POST['product_price'])) {
    $product_price = $_POST['product_price'];

} else {
    $product_price = null;
}

if (isset($_POST['product_image'])) {
    $product_image = $_POST['product_image'];

} else {
    $product_image = null;
}

//shorthand
$product_name = (string)$_POST['product_name'] ?? null;
$product_price = (int)$_POST['product_price'] ?? null;
$product_image = (string)$_POST['product_image'] ?? null;

if (!is_null($product_name) && !is_null($product_price) && !is_null($product_image)) {
    error_log("Variables set");

    $sql = "INSERT INTO `clothes` (`id`, `name`, `price`, `image`) 
    VALUES (NULL, '$product_name', '$product_price', '$product_image');";
    error_log('sql: ' . $sql);

    $result = $conn->query($sql);
    echo json_encode(array('status' => $result));

} else {
    echo json_encode(array('status' => 'php error'));
}

//finished so close the db connection
$conn->close();