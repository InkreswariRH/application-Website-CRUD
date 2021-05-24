<?php
    session_start();

    if( !isset($_SESSION["login"]) ){
        header('Location: login.php');
        exit;
    }

    require 'function.php';

    // pagination
    // konfigurasi
    $jumlahDataPerHalaman = 3;
    $jumlahData = count(tampil("SELECT * FROM member"));
    $jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);

    $halamanAktif = ( isset($_GET["halaman"]) ) ? $_GET["halaman"] : 1;
    
    // halaman = 2, awal data = 3
    // halaman = 3, awal data = 6
    $awalData = ( $jumlahDataPerHalaman * $halamanAktif ) - $jumlahDataPerHalaman;
    
    $result = tampil("SELECT * FROM member LIMIT $awalData, $jumlahDataPerHalaman");

    if( isset($_POST["cari"]) ){
        $key  = $_POST["keyword"];

        $result = cari($key);
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
</head>
<body>
    <a href="logout.php">Logout</a>
    <h1>Daftar Member</h1>

    <a href="tambah.php">Tambah Data</a>
    <br><br>

    <form action="" method="post">
        <input type="text" name="keyword" size="50" placeholder="masukkan keyword disini.." autofocus autocomplete="off">
        <button type="submit" name="cari">Cari Data</button>
    </form>
    <br>

    <?php if($halamanAktif > 1){ ?>
        <a href="?halaman=<?= $halamanAktif - 1; ?>">&laquo;</a>
    <?php } ?>
    
    <!-- navigasi -->
    <?php for($i = 1; $i <= $jumlahHalaman; $i++):?>
        <?php if($i == $halamanAktif): ?>
            <a href="?halaman=<?= $i; ?>" style="font-weight:bold; color:red;"><?= $i; ?></a>
        <?php else: ?>
            <a href="?halaman=<?= $i; ?>"><?= $i; ?></a>
        <?php endif; ?>
    <?php endfor; ?>

    <?php if($halamanAktif < $jumlahHalaman){ ?>
        <a href="?halaman=<?= $halamanAktif + 1; ?>">&raquo;</a>
    <?php } ?>

    <table border="1" cellspacing="0" cellpadding="10">
        <thead>
            <tr>
                <th>No.</th>
                <th>Aksi</th>
                <th>Foto</th>
                <th>Nama</th>
                <th>Grup</th>
                <th>Tahun Lahir</th>
                <th>Agensi</th>
            </tr>
        </thead>

        <?php $i = 1;?>
        <?php foreach($result as $row){?>
        <tbody>
            <tr>
                <td><?= $i; ?></td>
                <td>
                    <a href="ubah.php?id=<?= $row["id"]; ?>">Ubah</a> |
                    <a href="hapus.php?id=<?= $row["id"]; ?>">Hapus</a>
                </td>
                <td><img src="img/<?= $row["foto"]; ?>" width=30></td>
                <td><?= $row["nama"]; ?></td>
                <td><?= $row["grup"]; ?></td>
                <td><?= $row["tahun_lahir"]; ?></td>
                <td><?= $row["agensi"]; ?></td>
            </tr>   
        </tbody>
        <?php $i++;?>
        <?php } ?>
    
    </table>
</body>
</html>