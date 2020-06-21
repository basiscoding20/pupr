$(function(){
  $('.tambah-data').on('click', function() {
  $('#modal-title').html('Tambah Data ');
  $('.modal-footer button[type=submit]').html('Tambah Data');
  $('.modal-body form').attr('action','http://localhost/aplikasi/kontruksi');
  $('#id_kontruksi').val('');
  $('#kategori').val('');
  $('#nama_kontruksi').val('');
  $('#luas').val('');
  $('#latitude').val('');
  $('#longitude').val('');
  $('.oldImage img').attr('src','http://localhost/aplikasi/assets/img/kontruksi/default.png');
});
            // ubah data
            $('.update-data').on('click', function() {
            $('#modal-title').html('Update Data');
            $('.modal-footer button[type=submit]').html('Ubah Data');
            $('.modal-body form').attr('action','http://localhost/aplikasi/kontruksi/update');
            const id = $(this).data('id');
            $.ajax({
              url: 'http://localhost/aplikasi/kontruksi/dataKontruksi',
              data: {id : id},
              method: 'post',
              dataType: 'json',
              success: function(data){
                  $('#id_kontruksi').val(data.id_kontruksi);
                  $('#kategori').val(data.id_kategori);
                  $('#nama_kontruksi').val(data.nama_kontruksi);
                  $('#luas').val(data.luas);
                  $('#latitude').val(data.latitude);
                  $('#longitude').val(data.longitude);
                  $('.oldImage img').attr('src','http://localhost/aplikasi/assets/img/kontruksi/'+data.image);
              }
            });

          });
});
