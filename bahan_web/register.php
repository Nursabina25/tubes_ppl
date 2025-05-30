<?php
// Konfigurasi database
$host = "localhost";
$username = "root";
$password = "";
$database = "gawe_yuk";

// Membuat koneksi ke database
$conn = new mysqli($host, $username, $password, $database);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Periksa apakah form telah dikirim
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Ambil data dari form
    $full_name = trim($_POST["full_name"]);
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);
    $gender = trim($_POST["gender"]);
    $birthdate = trim($_POST["birthdate"]);
    $status = trim($_POST["status"]);
    $skills = trim($_POST["skills"]); // Ambil data keahlian

    // Validasi input
    if (empty($full_name) || empty($email) || empty($password) || empty($gender) || empty($birthdate) || empty($status) || empty($skills)) {
        echo "Semua kolom harus diisi.";
        exit;
    }

    // Validasi format email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Format email tidak valid.";
        exit;
    }

    
