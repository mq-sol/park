<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/leaflet.css" />
<script src="//cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/leaflet.js"></script>
<script src="/js/leaflet.ajax.js"></script>
<div id="map"></div>

<style>
    html,body,#map{
        margin: 0;
        padding: 0;
        width: 100%;
        height: 100%;
        background-color: gray;
    }
</style>
<script>
<?php if (!empty($method)){
    print("var gps=true;\n");
}else{
    print("var gps=false;\n");
}
?>
//地図のデフォルト値
//35.61726475358062, lng: 139.73176002502439
var map = L.map('map').setView([35.617264, 139.73176], 14);
//OSMレイヤー追加
L.tileLayer(
    '//{s}.tile.openstreetmap.org/{z}/{x}/{y}.png'
    ,{
        attribution: 'Map data c <a href="http://openstreetmap.org">OpenStreetMap</a>',
        maxZoom: 18
    }
).addTo(map);
function onEachFeature_SG(feature, layer) {
    if (feature.properties && feature.PLN_AREA_N) {
      layer.bindPopup(feature.properties.PLN_AREA_N);
    }
}
var geojsonLayer = new L.GeoJSON.AJAX("/park_lists/geojson").addTo(map);
if (gps){
    navigator.geolocation.getCurrentPosition(function(pos){
        console.log(pos);    
    }, 
    function(pos){
        console.log(pos);
    } , {
        

    });
}
</script>
