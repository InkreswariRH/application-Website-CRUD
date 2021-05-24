<?php
    require 'function.php';

    if( isset($_POST["register"]) ){

        if( registrasi($_POST) > 0 ){
            echo "
                <script>
                    alert('User baru berhasil ditambahkan!');
                </script>
            ";
        }else{
            echo mysqli_error($koneksi);
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Registrasi</title>
</head>
<body>
    <h1>Halaman Registrasi</h1>

    <form action="" method="post">
        <table>
            <tr>
                <td><label for="username">Username:</label></td>
                <td><input type="text" name="username" id="username" autofocus placeholder="masukkan username"></td>
            </tr>
            <tr>
                <td><label for="pass">Password:</label></td>
                <td><input type="password" name="password" id="pass" placeholder="masukkan password"></td>
            </tr>
            <tr>
                <td><label for="konfirmasi">Konfirmasi Password:</label></td>
                <td><input type="password" name="password2" id="konfirmasi" placeholder="konfirmasi password"></td>
            </tr>
        </table>
        <br>
        <button type="submit" name="register">Register</button>
    </form>
    
</body>
</html>