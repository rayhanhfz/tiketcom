<?php
$host = 'localhost'; // Host database
$dbname = 'bus_ticketing'; // Nama database
$username = 'root'; // Nama pengguna database
$password = ''; // Kata sandi pengguna database

// Membuat koneksi ke database
$conn = new mysqli($host, $username, $password, $dbname);

// Mengecek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
