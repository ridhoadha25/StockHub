<?php

require '../config/auth.php';
require '../config/database.php';

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$id = $_GET['id'];

mysqli_query(
    $conn,
    "DELETE FROM products WHERE id = '$id'"
);

header("Location: index.php");
exit;