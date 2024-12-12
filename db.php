<?php
$host = 'localhost'; // Ganti dengan host database Anda, jika perlu
$username = 'root'; // Ganti dengan username database Anda
$password = ''; // Ganti dengan password database Anda
$database = 'bridgemates'; // Nama database

// Koneksi ke database
$conn = mysqli_connect($host, $username, $password, $database);

// Cek apakah koneksi berhasil
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}