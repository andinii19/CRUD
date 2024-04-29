<?php
include 'koneksi.php';

if(isset($_GET['ID'])) {
    $ID = $_GET['ID'];

    $sql = "SELECT * FROM datakaryawan WHERE ID='$ID'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) == 1){
        $row = mysqli_fetch_assoc($result);
        $ID = $row['ID'];
        $nama = $row['nama'];
        $tanggal_lahir = $row['tanggal_lahir'];
        $jenis_kelamin = $row['jenis_kelamin'];

    }else{
        echo "Data tidak ditemukan.";
        exit();
    }

}else{
    echo "ID tidak ditemukan.";
    exit();
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $ID = $_POST['ID'];
    $nama= $_POST['nama'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $jenis_kelamin = $_POST['jenis_kelamin'];

    $sql = "UPDATE datakaryawan SET nama='$nama', tanggal_lahir='$tanggal_lahir', jenis_kelamin='$jenis_kelamin' WHERE ID='$ID'";

    if(mysqli_query($conn, $sql)){
        echo "Data berhasil diubah";
    }else{
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    header("Location: dataKaryawan.php");
    exit();
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
<h2 >Form Mengubah Data Mahasiswa</h2>
    <!-- Form untuk mengubah data -->
    <form method="POST" action="">
    <label for="ID"></label>
    <input type="text" id="ID" name="ID" placeholder="ID" class="input input-bordered input-info w-full max-w-xs mt-5 ml-5" value="<?php echo $ID; ?>" required> <br>
    <label for="nama"></label>
    <input type="text" id="nama" name="nama" placeholder="NAMA" class="input input-bordered input-info w-full max-w-xs mt-5 ml-5" value="<?php echo $nama; ?>"required> <br>
    <label for="tanggal_lahir"></label>
    <input type="date" id="tanggal_lahir" name="tanggal_lahir" placeholder="TANGGAL LAHIR" class="input input-bordered input-info w-full max-w-xs mt-5 ml-5" value="<?php echo $tanggal_lahir; ?>"required> <br>
    <div class="mt-5 ml-5">
    <label>Jenis Kelamin:</label>
        <input type="radio" id="laki-laki" name="jenis_kelamin" value="Laki-laki" <?php if($jenis_kelamin == 'Laki-laki') echo 'checked'; ?> required>
        <label for="laki-laki">Laki-laki</label>
        <input type="radio" id="perempuan" name="jenis_kelamin" value="Perempuan" <?php if($jenis_kelamin == 'Perempuan') echo 'checked'; ?> required>
        <label for="perempuan">Perempuan</label>
    </div> <br>

    <button type="submit" class="btn btn-success">Ubah Data</button>
</form>
    
</body>
</html>