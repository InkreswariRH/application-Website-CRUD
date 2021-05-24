<?php
    session_start();

    if( !isset($_SESSION["login"]) ){
        header('Location: login.php');
        exit;
    }
    
    require 'function.php';

    if(isset($_POST["submit"])){

        if( tambah($_POST) > 0 ){   
            echo "
                <script>
                    alert('Data berhasil ditambahkan');
                    document.location.href='index.php';
                </script>
            ";
        }else{
            echo "
                <script>
                    alert('Data gagal ditambahkan');
                    document.location.href='index.php';
                </script>
            ";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Tambah Data</title>
</head>
<body>
    <h1>Halaman Tambah Data Member</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td><label for="nama">Nama:</label></td>
                <td><input type="text" name="namaku" id="nama" autocomplete="off"></td>
            </tr>
            <tr>
                <td><label for="grup">Grup:</label></td>
                <td><input type="text" name="grup" id="grup" autocomplete="off"></td>
            </tr>
            <tr>
                <td><label for="lahir">Tahun Lahir:</label></td>
                <td><input type="text" name="tahun_lahir" id="lahir" autocomplete="off"></td>
            </tr>
            <tr>
                <td><label for="agensi">Agensi:</label></td>
                <td><input type="text" name="agensi" id="agensi" autocomplete="off"></td>
            </tr>
            <tr>
                <td><label for="foto">Foto:</label></td>
                <td><input type="file" name="foto" id="foto" autocomplete="off"></td>
            </tr>
        </table>
        <button type="submit" name="submit">Tambah Data</button>
    
    </form>
    
</body>
</html>