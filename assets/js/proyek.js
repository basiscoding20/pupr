$(function(){
  $('.pilih-data').on('click', function() {
  const id = $(this).data('id');
  const nama = $(this).data('nama');
  $('#id_kontruksi').val(id);
  $('#nama_kontruksi').val(nama);
});
$('.pilih-data-kontruksi').on('click', function() {
const id = $(this).data('id');
const nama = $(this).data('nama');
$('#id_jasa').val(id);
$('#nama_jasa').val(nama);
});

});
