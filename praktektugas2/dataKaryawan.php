<?php
session_start();

include 'koneksi.php';

$sql = "SELECT * FROM datakaryawan";
$result = mysqli_query($conn, $sql);

if($result){
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrator</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.10.1/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="navbar bg-base-300 shadow-lg mb-5 mt-5">
        <div class="navbar-start">
            <div class="dropdown">
                <div tabindex="0" role="button" class="btn btn-ghost btn-circle">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" /></svg>
                </div>
                <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
                    <li><a href="beranda.php">Homepage</a></li>
                    <li><a href="dataKaryawan.php">Data Karyawan</a></li>
                    <li><a href="logout.php">Log Out</a></li>
                </ul>
            </div>
        </div>
        <div class="navbar-center">
            <a class="btn btn-ghost text-xl">Selamat Datang</a>
        </div>
        <div class="navbar-end">
            <button class="btn btn-ghost btn-circle">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
            </button>
            <button class="btn btn-ghost btn-circle">
            <div class="indicator">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" /></svg>
                <span class="badge badge-xs badge-primary indicator-item"></span>
            </div>
            </button>
        </div>
    </div>

    <div class="overflow-x-auto">
  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Tanggal Lahir</th>
        <th>Jenis Kelamin</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
    <?php
            //Perulangan untuk menampilkan setiap baris data dari hasil query//
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['ID'] . "</td>";
                echo "<td>" . $row['nama'] . "</td>";
                echo "<td>" . $row['tanggal_lahir'] . "</td>";
                echo "<td>" . $row['jenis_kelamin'] . "</td>";
                echo "<td class='action-buttons'>";
                echo "<a href='update.php?ID=" . $row['ID'] . "' class='btn btn-success btn-sm '>Update</button></a>";
                echo "<a href='delete.php?ID=" . $row['ID'] . "' class='btn btn-error btn-sm ml-5' onclick='return confirmDelete()' >Delete</button></a>"; 
                echo "</td>";
                echo "</tr>";
            }
            ?>
    </tbody>
  </table>
</div>
<a href="tambahdata.php" class="btn btn-info mt-5"><button>Tambah Data</button></a>
<script>
    function confirmDelete() {
        return confirm("Apakah Anda yakin ingin menghapus data ini?");
    }
    </script>
</body>
</html>

<?php
}else{
    echo "error";
}
?>