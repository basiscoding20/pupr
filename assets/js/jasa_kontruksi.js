$(function(){
  $('.tambah-data').on('click', function() {
  $('#modal-title').html('Tambah Data ');
  $('.modal-footer button[type=submit]').html('Tambah Data');
  $('.modal-body form').attr('action','http://localhost/aplikasi/jasa_Kontruksi');
  $('#id_jasa').val('');
  $('#nama_jasa').val('');
  $('#no_tlp').val('');
  $('#alamat').val('');
  $('#email').val('');
});
            // ubah data
            $('.update-data').on('click', function() {
            $('#modal-title').html('Update Data');
            $('.modal-footer button[type=submit]').html('Ubah Data');
            $('.modal-body form').attr('action','http://localhost/aplikasi/jasa_Kontruksi/update');
            const id = $(this).data('id');
            $.ajax({
              url: 'http://localhost/aplikasi/jasa_Kontruksi/dataJasa',
              data: {id : id},
              method: 'post',
              dataType: 'json',
              success: function(data){
                console.log(data);
                  $('#id_jasa').val(data.id_jasa);
                  $('#nama_jasa').val(data.nama_jasa);
                  $('#no_tlp').val(data.no_tlp);
                  $('#alamat').val(data.alamat);
                  $('#email').val(data.email);
              }
            });

          });
});
