<?php
session_start();
if(!isset($_SESSION['username'])){
    header('Location: login.php');
    exit();
}
include 'koneksi.php';

$status = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ID = $_POST['ID'];
    $nama= $_POST['nama'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $jenis_kelamin = $_POST['jenis_kelamin'];

    $sql = "INSERT INTO datakaryawan (ID, nama, tanggal_lahir, jenis_kelamin) VALUES ('$ID', '$nama', '$tanggal_lahir', '$jenis_kelamin')";

    if (mysqli_query($conn, $sql)) {
        $status = "Data berhasil ditambahkan!";
        header("Location: datakaryawan.php");
        exit();
    } else {
        $status = "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.10.1/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<h2 >Form Tambah Data Mahasiswa</h2>
    <!-- Form untuk menambahkan data -->
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="ID"></label>
    <input type="text" id="ID" name="ID" placeholder="ID" class="input input-bordered input-info w-full max-w-xs mt-5 ml-5" required> <br>
    <label for="nama"></label>
    <input type="text" id="nama" name="nama" placeholder="NAMA" class="input input-bordered input-info w-full max-w-xs mt-5 ml-5" required> <br>
    <label for="tanggal_lahir"></label>
    <input type="date" id="tanggal_lahir" name="tanggal_lahir" placeholder="TANGGAL LAHIR" class="input input-bordered input-info w-full max-w-xs mt-5 ml-5" required> <br>
    <div class="mt-5 ml-5">
        <label>Jenis Kelamin:</label>
        <input type="radio" id="laki-laki" name="jenis_kelamin" value="Laki-laki" required>
        <label for="laki-laki">Laki-laki</label>
        <input type="radio" id="perempuan" name="jenis_kelamin" value="Perempuan" required>
        <label for="perempuan">Perempuan</label>
    </div> <br>

    <button type="submit" class="btn btn-info mt-5 ">Tambah Data</button>
</form>
    
</body>
</html>