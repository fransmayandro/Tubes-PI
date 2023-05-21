<?php
// konfigurasi koneksi ke database
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "db_kerja";

// bikin koneksi ke database
$conn = new mysqli($servername, $username, $password, $db_kerja);

// cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// menangkap data dari form registrasi
$username = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];

// query ubuat nyimpan data ke tabel users
$sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "Registrasi berhasil";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>
