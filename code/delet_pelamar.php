<?php
session_start();
include 'config.php';

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['user_id'])) {
    $user_id = $_POST['user_id'];

    // Hapus pelamar berdasarkan user_id
    $query = "DELETE FROM terlamar WHERE user_id = '$user_id'";
    if (mysqli_query($koneksi, $query)) {
        echo "Pelamar berhasil dihapus.";
    } else {
        echo "Gagal menghapus pelamar: " . mysqli_error($koneksi);
    }
    echo "<p><a href='homepage_pembuat_lamaran.php'>Kembali ke Homepage</a></p>";
} else {
    echo "Aksi tidak valid.";
}
?>
