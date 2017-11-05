<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/leaflet.css" />
<script src="//cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/leaflet.js"></script>
<script src="/js/leaflet.ajax.js"></script>
<table class="tbl">
    <tr>
        <td><form class="form-inline"><input type="text"><button type="button">再検索</button></form></td>
    </tr>
    <tr>
        <td><div id="map" class="mp"></div>
    </tr>
    <tr>
        <td>
            <table id="search_list">
                <tr>
                    <td rowspan="3" class="c-1"><img src="/img/icon.png"></td>
                    <td class="c-2">名称</td> 
                    <td rowspan="3" class="c-3"> 写真 </td>
                </tr>
                <tr>
                    <td class="c-2">ニックネーム</td>
                </tr>
                <tr>
                    <td class="c-2">タグリスト</td>
                </tr>
            </table>
        </td>
    </tr>
</table>
<style>
    html,body{
        margin: 0;
        padding: 0;
        width: 100%;
        height: 100%;
        overflow: hidden;
    }
   
    .list{
        min-height: 300px;
        overflow: scroll;
    }
</style>
<script>
$(document).ready(function(){
    var h = $("html").height();
    var w = $("html").width();
    $("#map").height(h / 2);
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
            var lat = pos.coords.latitude;
            var lng = pos.coords.longitude;
            map.setView(new L.LatLng(lat, lng), 16);
        }, 
        function(pos){
            console.log(pos);
        } , {

        });
    }
});
</script>
