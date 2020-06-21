$(function(){
  $('.tambah-data').on('click', function() {
  $('#modal-title').html('Tambah Data ');
  $('.modal-footer button[type=submit]').html('Tambah Data');
  $('.modal-body form').attr('action','http://localhost/aplikasi/kategori');
  $('#id_kategori').val('');
  $('#kategori').val('');
});
            // ubah data
            $('.update-data').on('click', function() {
            $('#modal-title').html('Update Data');
            $('.modal-footer button[type=submit]').html('Ubah Data');
            $('.modal-body form').attr('action','http://localhost/aplikasi/kategori/update');
            const id = $(this).data('id');
            $.ajax({
              url: 'http://localhost/aplikasi/kategori/dataKategori',
              data: {id : id},
              method: 'post',
              dataType: 'json',
              success: function(data){
                  $('#id_kategori').val(data.id_kategori);
                  $('#kategori').val(data.kategori);
              }
            });
          });
});
