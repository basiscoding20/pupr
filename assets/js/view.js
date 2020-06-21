var url = window.location.href;
var id=url.split('/');
view(id[6]);
details();
pengaduan();


function view(id) {
  $.ajax({
    url: 'http://localhost/aplikasi/auth/getData',
    data: {id : id},
    method: 'post',
    dataType: 'json',
    success: function(data){
      var map = L.map('map').setView([data.latitude,data.longitude],12);
      L.tileLayer('https://api.maptiler.com/maps/streets/{z}/{x}/{y}.png?key=HmjFo1k1lKBbT3vn9HWh',{
        attribution:'<a href="https://www.maptiler.com/copyright/" target="_blank">&copy; MapTiler</a> <a href="https://www.openstreetmap.org/copyright" target="_blank">&copy; OpenStreetMap contributors</a>',
      }).addTo(map);
         var marker = L.marker([data.latitude,data.longitude]);
         marker.addTo(map);
    }
  });
}
function details() {
  $('.view-proyek').on('click', function() {
  const id = $(this).data('id');
  $.ajax({
    url: 'http://localhost/aplikasi/auth/getDataDetails',
    data: {id : id},
    method: 'post',
    dataType: 'json',
    success: function(data){
        $('#id_proyek').html(data.id_proyek);
        $('#kategori').html(data.kategori);
        $('#nama_jasa').html(data.nama_jasa);
        $('#tanggal_kontrak').html(data.tanggal_kontrak);
        $('#akhir_kontrak').html(data.akhir_kontrak);
        $('#pelaksanaan').html(data.pelaksanaan);
        $('#tahun_anggaran').html(data.tahun_anggaran);
        $('#keterangan').html(data.keterangan);
        $('.image1 img').attr('src','http://localhost/aplikasi/assets/img/proyek/'+data.image1);
        $('.image2 img').attr('src','http://localhost/aplikasi/assets/img/proyek/'+data.image2);
    }
  });

});
}
function pengaduan() {
  $('.view-pengaduan').on('click', function() {
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
}
















// map.dragging.disable();
// map.touchZoom.disable();
// map.doubleClickZoom.disable();
// map.scrollWheelZoom.disable();
// map.boxZoom.disable();
// map.keyboard.disable();
// var latlngs = [
  //   [-6.309446, 106.107757],
  //   [-6.312472, 106.105040]
  // ];
  // L.polyline(latlngs, {color: 'red'}).addTo(map);
