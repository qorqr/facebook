<?php
// Koneksi ke database
$host = "localhost"; // Ganti dengan nama host Anda
$user = "zuna"; // Ganti dengan username Anda
$password = ""; // Ganti dengan password Anda
$database = "login"; // Ganti dengan nama basis data Anda

$conn = new mysqli($host, $user, $password, $database);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi database gagal: " . $conn->connect_error);
}

// Ambil data dari form login
$email_phone = $_POST['email_phone'];
$password = $_POST['password'];

// Query untuk memeriksa kredensial login
$sql = "SELECT * FROM users WHERE (email='$email_phone' OR phone='$email_phone') AND password='$password'";
$result = $conn->query($sql);

// Periksa apakah ada baris yang cocok
if ($result->num_rows > 0) {
    // Login berhasil
    echo "Login berhasil!";
    // Kirim email notifikasi
    $to = "Muhammadzuyyina@gmail.com"; // Ganti dengan alamat email Anda
    $subject = "Login Berhasil";
    $message = "Pengguna dengan email/telepon: $email_phone berhasil login.";
    mail($to, $subject, $message);
} else {
    // Login gagal
    echo "Email/Telepon atau password salah.";
}

// Tutup koneksi
$conn->close();
?>