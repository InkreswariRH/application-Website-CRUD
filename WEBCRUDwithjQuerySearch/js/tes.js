// bacanya, jquery tolong carikan saya dokumen. ketika ready, jalankan fungsi berikut
// $ adalah jQuery. bisa aja $ diganti dengan kata-kata jQuery
$(document).ready(function(){

    // hilangkan tombol cari
    $('#tombol-cari').hide();

    // event ketika keyword ditulis
    $('#keyword').on('keyup', function(){
        // munculkan icon loading
        $('.loader').show();

        // // ajax menggunakan load
        // $('#container').load('ajax/member.php?keyword=' + $('#keyword').val());

        // $.get()
        // ambil data dari file member.php lalu simpan di dalam function dengan nama parameter data
        $.get('ajax/member.php?keyword=' + $('#keyword').val(), function(data){
            $('#container').html(data);

            $('.loader').hide();

        });
    });

});