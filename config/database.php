<?php

$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "stockhub"
);

if(!$conn){
    die("Koneksi gagal");
}