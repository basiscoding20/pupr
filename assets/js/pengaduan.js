
pengaduan();
function pengaduan() {
  $('.pengaduan').on('click', function() {
  const id = $(this).data('id');
  $.ajax({
    url: 'http://localhost/aplikasi/auth/getData',
    data: {id : id},
    method: 'post',
    dataType: 'json',
    success: function(data){
        $('#id_jalan').val(data.id_jalan);
        $('#nama_jalan').val(data.nama_jalan);
    }
  });

});
}

$('.view').on('click', function() {
$('#modal-title').html('Pengaduan Masyarakat');
const id = $(this).data('id');
$.ajax({
  url: 'http://localhost/aplikasi/auth/getDataPengaduan',
  data: {id : id},
  method: 'post',
  dataType: 'json',
  success: function(data){
      $('#id_pengaduan').html(data.id_pengaduan);
      $('#nama_masyarakat').html(data.nama_masyarakat);
      $('#email').html(data.email);
      $('#no_tlp').html(data.no_tlp);
      $('#ket').html(data.keterangan);
      $('.image img').attr('src','http://localhost/aplikasi/assets/img/pengaduan/'+data.image);
  }

});

});
