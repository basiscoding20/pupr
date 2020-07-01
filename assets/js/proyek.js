$(function(){
  $('.pilih-data').on('click', function() {
  const id = $(this).data('id');
  const nama = $(this).data('nama');
  $('#id_jalan').val(id);
  $('#nama_jalan').val(nama);
});
$('.pilih-data-kontruksi').on('click', function() {
const id = $(this).data('id');
const nama = $(this).data('nama');
$('#id_jasa').val(id);
$('#nama_jasa').val(nama);
});

$('#anggaran').on('input', function() {
rubah('anggaran');
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
