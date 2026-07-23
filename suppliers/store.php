<?php

require '../config/database.php';

$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$address = $_POST['address'];

mysqli_query(
$conn,
"INSERT INTO suppliers
(name, phone, email, address)
VALUES
('$name','$phone','$email','$address')"
);

header("Location:index.php");