// ambil elemen yang dibutuhkan dengan teknik penelusuran DOM 
var keyword = document.getElementById('keyword');
var tombolCari = document.getElementById('tombol-cari');
var container = document.getElementById('container');

// tambahkan event ketika keyword ditulis
keyword.addEventListener('keyup', function(){
    
    // buat objek ajax
    var xhr = new XMLHttpRequest();

    // cek kesiapan ajax
    // saat menggunakan ajax, akan merequest data ke suatu tempat, nah tempat ini harus dipastikan siap untuk merespon
    xhr.onreadystatechange = function(){
        // ready state nilai antara 0-4 (inisialisasi (0), membuka koneksi (1), dst. 4 itu artinya sumber sudah ready.) 
        // status kalo 200 itu berarti sumber sudah ready. kalo 404 sumber tidak ditemukan
        if( xhr.readyState == 4 && xhr.status == 200 ) {
            container.innerHTML = xhr.responseText;
        }
    }

    // eksekusi ajax

    // buka koneksi ajax. parameternya(metodenya get/post, request data ajax darimana/sumber datanya dari mana, async (true) atau sync (false))
    xhr.open('GET', 'ajax/member.php?keyword=' + keyword.value, true);
    // menjalankan ajax
    xhr.send();

});
