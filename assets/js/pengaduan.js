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
        $('#id_kontruksi').val(data.id_kontruksi);
        $('#nama_kontruksi').val(data.nama_kontruksi);
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
