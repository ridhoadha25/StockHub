<?php

require '../config/database.php';

$id = $_POST['id'];
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$address = $_POST['address'];

mysqli_query(
$conn,
"UPDATE suppliers
SET
name='$name',
phone='$phone',
email='$email',
address='$address'
WHERE id='$id'"
);

header("Location:index.php");