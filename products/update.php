<?php

require '../config/database.php';

$id = $_POST['id'];
$category_id = $_POST['category_id'];
$supplier_id = $_POST['supplier_id'];
$code = $_POST['code'];
$name = $_POST['name'];
$stock = $_POST['stock'];
$min_stock = $_POST['min_stock'];
$buy_price = $_POST['buy_price'];
$sell_price = $_POST['sell_price'];

mysqli_query(
    $conn,
    "UPDATE products SET
    category_id = '$category_id',
    supplier_id = '$supplier_id',
    code = '$code',
    name = '$name',
    stock = '$stock',
    min_stock = '$min_stock',
    buy_price = '$buy_price',
    sell_price = '$sell_price'
    WHERE id = '$id'"
);

header("Location:index.php");
exit;