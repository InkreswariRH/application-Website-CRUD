<?php 
    session_start();

    if( !isset($_SESSION["login"]) ){
        header('Location: login.php');
        exit;
    }
    
    require 'function.php';

    $id = $_GET["id"];
    $data =  tampil("SELECT * FROM member WHERE id=$id")[0];

   
    if(isset($_POST["submit"])){

        if( ubah($_POST) > 0 ){   
            echo "
                <script>
                    alert('Data berhasil diubah');
                    document.location.href='index.php';
                </script>
            ";
        }else{
            echo "
                <script>
                    alert('Data gagal diubah');
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
    <title>Halaman Ubah Data</title>
</head>
<body>
    <h1>Halaman Ubah Data Member</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td><input type="hidden" name="fotoLama" value="<?= $data["foto"]; ?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value="<?= $data["id"]; ?>"></td>
            </tr>
            <tr>
                <td><label for="nama">Nama:</label></td>
                <td><input type="text" name="namaku" id="nama" autocomplete="off" value="<?= $data["nama"]; ?>"></td>
            </tr>
            <tr>
                <td><label for="grup">Grup:</label></td>
                <td><input type="text" name="grup" id="grup" autocomplete="off" value="<?= $data["grup"]; ?>"></td>
            </tr>
            <tr>
                <td><label for="lahir">Tahun Lahir:</label></td>
                <td><input type="text" name="tahun_lahir" id="lahir" autocomplete="off" value="<?= $data["tahun_lahir"]; ?>"></td>
            </tr>
            <tr>
                <td><label for="agensi">Agensi:</label></td>
                <td><input type="text" name="agensi" id="agensi" autocomplete="off" value="<?= $data["agensi"]; ?>"></td>
            </tr>
            <tr>
                <td><label for="foto">Foto:</label></td>
                <td><img src="img/<?= $data["foto"]; ?>"></td>
                <td><input type="file" name="foto" id="foto" autocomplete="off"></td>
            </tr>
        </table>
        <button type="submit" name="submit">Ubah Data</button>
    
    </form>
    
</body>
</html>