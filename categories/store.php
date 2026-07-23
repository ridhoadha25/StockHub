<?php

require '../config/database.php';

$name = $_POST['name'];

mysqli_query(
$conn,
"INSERT INTO categories(name)
VALUES('$name')"
);

header("Location:index.php");