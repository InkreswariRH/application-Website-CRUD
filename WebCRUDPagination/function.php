<?php 
    $koneksi  = mysqli_connect("localhost", "root", "", "phpdasar");

    function tampil($query){
        global $koneksi;

        $result = mysqli_query($koneksi, $query);
        $rows = [];

        while( $row = mysqli_fetch_assoc($result) ){
            $rows[] = $row;
        }
        return $rows;
    }

    function tambah($data){
        global $koneksi;

        $nama = $data["namaku"];
        $grup = $data["grup"];
        $lahir = $data["tahun_lahir"];
        $agensi = $data["agensi"];

        $foto = upload();

        if( !$foto ){
            return false;
        }

        $query = "INSERT INTO member VALUES (
            '','$nama','$grup','$lahir','$agensi','$foto'
            )";

        mysqli_query($koneksi, $query);

        return mysqli_affected_rows($koneksi);
    }

    function upload(){
        $namafileUpload = $_FILES["foto"]["name"];
        $ukuranfileUpload = $_FILES["foto"]["size"];
        $errorUpload = $_FILES["foto"]["error"];
        $tmpName = $_FILES["foto"]["tmp_name"];

        // cek dulu apakah udah pilih gambar belum
        if( $errorUpload === 4 ){
            echo "
                <script>
                    alert('Anda belum upload foto! Pilih file terlebih dahulu');
                </script>
            ";
            return false;
        }

        // cek apakah file yang diupload adalah file gambar
        $ekstensiGambarUpload = explode(".", $namafileUpload);
        $ekstensiGambarUpload = strtolower(end($ekstensiGambarUpload));
        $ekstensiGambarValid = ["jpg", "jpeg", "png"];

        if( !in_array($ekstensiGambarUpload, $ekstensiGambarValid) ){
            echo "
                <script>
                    alert('File yang anda upload bukan gambar');
                </script>
            ";
            return false;
        }

        // cek apakah ukurannya tidak lebih besar dari batas ukuran yang ditentukan
        if( $ukuranfileUpload > 1000000 ){
            echo "
                <script>
                    alert('File yang anda upload lebih besar dari 1MB');
                </script>
            ";
            return false;
        }

        $namafileUploadBaru = uniqid();
        $namafileUploadBaru .= ".";
        $namafileUploadBaru .= $ekstensiGambarUpload;

        move_uploaded_file($tmpName, "img/" . $namafileUploadBaru);
        return $namafileUploadBaru;
    }

    function hapus($id,$data){
        global $koneksi;

        mysqli_query($koneksi, "DELETE FROM member WHERE id=$id");
        unlink("img/" . $data);

        return mysqli_affected_rows($koneksi);
    }

    function ubah($data){
        global $koneksi;

        $id = $data["id"];
        $nama = $data["namaku"];
        $grup = $data["grup"];
        $lahir = $data["tahun_lahir"];
        $agensi = $data["agensi"];
        $fotolama = $data["fotoLama"];

        if( $_FILES["foto"]["error"] === 4 ){
            $foto = $fotolama;
        }else{
            $foto = upload();
            unlink("img/" . $fotolama);
        }

        $query = "UPDATE member SET nama = '$nama', grup = '$grup', tahun_lahir = '$lahir', agensi = '$agensi', foto = '$foto' WHERE id=$id
        ";

        mysqli_query($koneksi, $query);

        return mysqli_affected_rows($koneksi);
    }

    function cari($key){
        global $koneksi;

        $query = "SELECT * FROM member WHERE
        nama LIKE '%$key%' OR
        grup LIKE '%$key%' OR
        tahun_lahir LIKE '%$key%' OR
        agensi LIKE '%$key%'
        ";

        return tampil($query);
    }

    function registrasi($data){
        global $koneksi;

        $username = strtolower(stripslashes($data["username"]));
        $pass = mysqli_real_escape_string($koneksi, $data["password"]);
        $konfirmasi = mysqli_real_escape_string($koneksi, $data["password2"]);

        // cek apakah sudah ada username dengan nama yang sama di database. kalo udah ada, ga boleh
        $result = mysqli_query($koneksi, "SELECT username FROM user WHERE username='$username'");

        if( mysqli_fetch_assoc($result) ){
            echo "
                <script>
                    alert('username sudah terdaftar');
                </script>
            ";
            return false;
        }
        
        // cek apakah password yang dimasukkan sudah sama dengan konfirmasi password
        if( $pass !== $konfirmasi ){
            echo "
                <script>
                    alert('konfirmasi password tidak sesuai');
                </script>
            ";
            return false;
        }
        
        // enkripsi password
        $pass = password_hash($pass, PASSWORD_DEFAULT);

        // tambahkan data baru ke database
        mysqli_query($koneksi, "INSERT INTO user VALUES ('','$username','$pass')");

        return mysqli_affected_rows($koneksi);
    }
?>