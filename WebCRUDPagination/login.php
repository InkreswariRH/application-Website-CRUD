<?php
    session_start();
    require 'function.php';

    // cek cookie
    if( isset($_COOKIE["id"]) && isset($_COOKIE["key"]) ){
        $id = $_COOKIE["id"];
        $key = $_COOKIE["key"];

        // ambil username berdasarkan id
        $result = mysqli_query($koneksi, "SELECT username FROM user WHERE id=$id");
        $row = mysqli_fetch_assoc($result);

        // cek cookie dan username
        if($key === hash("sha256", $row["username"])){
            $_SESSION["login"] = true;
        }

    }

    if( isset($_SESSION["login"]) ){
        header("Location: index.php");
        exit;
    }


    if( isset($_POST["login"]) ){

        $username = $_POST["username"];
        $pass = $_POST["pass"];

        $result = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username'");

        if( mysqli_num_rows($result) === 1 ){
            $row = mysqli_fetch_assoc($result);

            if( password_verify($pass, $row["password"]) ){
                // set session
                $_SESSION["login"] = true;

                // cek remember me
                if( isset($_POST["remember"]) ){
                    // buat cookie
                    setcookie("id", $row["id"], time() + 60);
                    setcookie("key", hash("sha256", $row["username"]), time() + 60);
                    
                }

                header('Location:index.php');
                exit;
            }
        }
        $error = true;
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
</head>
<body>
    <h1>Halaman Login</h1>

    <?php if( isset($error) ) {?>
        <p style="color:red; font-style:italic;">username / password tidak sesuai!</p>
    <?php } ?>

    <form action="" method="post">
        <table>
            <tr>
                <td><label for="username">Username:</label></td>
                <td><input type="text" name="username" id="username" autocomplete="off"></td>
            </tr>
            <tr>
                <td><label for="pass">Password:</label></td>
                <td><input type="password" name="pass" id="pass" autocomplete="off"></td>
            </tr>
            <tr>
                <td><input type="checkbox" name="remember" id="remember"></td>
                <td><label for="remember">Remember me</label></td>
            </tr>
        </table>
        <button type="submit" name="login">Login</button>
    </form>
    
</body>
</html>