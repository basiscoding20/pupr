$(function(){
  $('.tambah-data').on('click', function() {
  $('#modal-title').html('Tambah Data ');
  $('.modal-footer button[type=submit]').html('Tambah Data');
  $('.modal-body form').attr('action','http://localhost/aplikasi/jalan');
  $('#id_jalan').val('');
  $('#nama_jalan').val('');
  $('#panjang').val('');
  $('#lebar').val('');
  $('#pekerasan').val('');
  $('#latitude').val('');
  $('#longitude').val('');
  $('.oldImage1 img').attr('src','http://localhost/aplikasi/assets/img/jalan/default.png');
  $('.oldImage2 img').attr('src','http://localhost/aplikasi/assets/img/jalan/default.png');
});
            // ubah data
            $('.update-data').on('click', function() {
            $('#modal-title').html('Update Data');
            $('.modal-footer button[type=submit]').html('Ubah Data');
            $('.modal-body form').attr('action','http://localhost/aplikasi/jalan/update');
            const id = $(this).data('id');
            $.ajax({
              url: 'http://localhost/aplikasi/jalan/dataJalan',
              data: {id : id},
              method: 'post',
              dataType: 'json',
              success: function(data){
                  $('#id_jalan').val(data.id_jalan);
                  $('#nama_jalan').val(data.nama_jalan);
                  $('#panjang').val(data.panjang);
                  $('#pekerasan').val(data.pekerasan);
                  $('#lebar').val(data.lebar);
                  $('#latitude').val(data.latitude);
                  $('#longitude').val(data.longitude);
                  $('.oldImage1 img').attr('src','http://localhost/aplikasi/assets/img/jalan/'+data.image1);
                  $('.oldImage2 img').attr('src','http://localhost/aplikasi/assets/img/jalan/'+data.image2);
              }
            });

          });

          $('.view').on('click', function() {
          $('#modal-title').html('Update Data');
          const id = $(this).data('id');
          $.ajax({
            url: 'http://localhost/aplikasi/jalan/dataJalan',
            data: {id : id},
            method: 'post',
            dataType: 'json',
            success: function(data){
                $('#id_jalan').html(data.id_jalan);
                $('#nama_jalan').html(data.nama_jalan);
                $('#nama_desa').html(data.nama_desa);
                $('#panjang').html(data.panjang+'m');
                $('#pekerasan').html(data.pekerasan);
                $('#lebar').html(data.lebar+'m');
                $('#latitude').html(data.latitude);
                $('#longitude').html(data.longitude);
                $('.image1 img').attr('src','http://localhost/aplikasi/assets/img/jalan/'+data.image1);
                $('.image2 img').attr('src','http://localhost/aplikasi/assets/img/jalan/'+data.image2);
            }
          });

        });
          $('#panjang').on('input', function() {
          rubah('panjang');
            });
            $('#lebar').on('input', function() {
            rubah('lebar');
              });
          function rubah(id) {
          const x = document.getElementById(id).value;
          const datax = rubahInt(x);
          const rupiah = rubahRupiah(datax);
          document.getElementById(id).value = rupiah;
          }
          function rubahInt(data) {
          var numb = data.match(/\d/g);
          if (numb == null) {
            numb = ['0'];
          }
          m = numb.join("");
          m = parseInt(m);
          return m ;
          }
          function rubahRupiah(data) {
          let	rubahString = data.toString(),
            sisa 	= rubahString.length % 3,
            rupiah 	= rubahString.substr(0, sisa),
            ribuan 	= rubahString.substr(sisa).match(/\d{3}/g);

          if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
          }
          return rupiah;
          }
});
