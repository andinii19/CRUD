<?php
include 'koneksi.php';

// Periksa apakah ada parameter ID yang dikirimkan melalui URL
if(isset($_GET['ID'])) {
    $ID = $_GET['ID'];

    // Query untuk menghapus data mahasiswa berdasarkan ID
    $sql = "DELETE FROM datakaryawan WHERE ID='$ID'";

    // Eksekusi query
    if (mysqli_query($conn, $sql)) {
        echo "Data berhasil dihapus!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Redirect kembali ke halaman home
    header("Location: dataKaryawan.php");
    exit();
} else {
    echo "ID tidak ditemukan.";
    exit();
}
?>