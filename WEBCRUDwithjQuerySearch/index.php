<?php
    session_start();

    if( !isset($_SESSION["login"]) ){
        header('Location: login.php');
        exit;
    }

    require 'function.php';

    $result = tampil("SELECT * FROM member");

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
    <style>
        .loader{
            width: 100px;
            position: absolute;
            top: 100px;
            left: 375px;
            z-index: -1;
            display: none;
        }
    </style>
    <!-- jquery sebenarnya adalah script javascript. jquery adalah framework yang memudahkan kita untuk ngoding javascript -->
    <!-- simpan jquery sebelum script javascript yang kita buat sendiri -->
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/tes.js"></script>
</head>
<body>
    <a href="logout.php">Logout</a>
    <h1>Daftar Member</h1>

    <a href="tambah.php">Tambah Data</a>
    <br><br>

    <form action="" method="post">
        <input type="text" name="keyword" size="50" placeholder="masukkan keyword disini.." autofocus autocomplete="off" id="keyword">
        <button type="submit" name="cari" id="tombol-cari">Cari Data</button>

        <img src="img/loader.gif" class="loader">
    </form>
    <br>

    <div id="container">
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
    </div>



</body>
</html>