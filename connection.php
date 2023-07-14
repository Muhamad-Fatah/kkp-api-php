<?php

header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");

$servername = "localhost";
$username = "root";
$password = "";
$database = "db_mahasiswa";

// Membuat koneksi
$conn = mysqli_connect($servername, $username, $password, $database);

// Memeriksa koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
