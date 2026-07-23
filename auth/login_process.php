<?php

session_start();

require '../config/database.php';

$email = $_POST['email'];
$password = $_POST['password'];

$query = mysqli_query(
$conn,
"SELECT * FROM users WHERE email='$email'"
);

$user = mysqli_fetch_assoc($query);

if($user && password_verify(
$password,
$user['password']
)){

$_SESSION['user'] = $user;

header("Location: ../dashboard/index.php");

}else{

header("Location: login.php");

}