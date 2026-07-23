<?php

require '../config/database.php';

$id = $_POST['id'];
$name = $_POST['name'];

mysqli_query(
$conn,
"UPDATE categories
SET name='$name'
WHERE id='$id'"
);

header("Location:index.php");