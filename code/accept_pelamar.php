<?php
session_start();
include 'config.php';

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['lamaran_id'])) {
    $lamaran_id = $_POST['lamaran_id'];

    // Hapus lamaran berdasarkan lamaran_id
    $query = "DELETE FROM terlamar WHERE Id_lamaran = '$lamaran_id'";
    $querylamaran = "DELETE FROM lamaran WHERE ID_lamaran = '$lamaran_id'";
    mysqli_query($koneksi, $querylamaran);
    if (mysqli_query($koneksi, $query)) {
        echo "Lamaran berhasil diaccept.";
    } else {
        echo "Gagal mengaccept lamaran: " . mysqli_error($koneksi);
    }
    echo "<p><a href='homepage_pembuat_lamaran.php'>Kembali ke Homepage</a></p>";
} else {
    echo "Aksi tidak valid.";
}
?>
