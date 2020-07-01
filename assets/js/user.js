$(function(){
            // ubah data
            $('.update-data').on('click', function() {
            $('#modal-title').html('Update Data');
            $('.modal-footer button[type=submit]').html('Ubah Data');
            $('.modal-body form').attr('action','http://localhost/aplikasi/admin/dataUser');
            const id = $(this).data('id');
            $.ajax({
              url: 'http://localhost/aplikasi/admin/getData',
              data: {id : id},
              method: 'post',
              dataType: 'json',
              success: function(data){
                  $('#id_user').val(data.id_user);
                  $('#nama').val(data.nama);
                  $('#no_tlp').val(data.no_tlp);
                  $('#email').val(data.email);
                  $('#aktif').val(data.aktif);
                  $('#akses').val(data.akses);
              }
            });
          });
});
