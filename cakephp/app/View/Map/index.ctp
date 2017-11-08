<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/leaflet.css" />
<script src="//cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/leaflet.js"></script>
<script src="/js/leaflet.ajax.js"></script>
<table class="table">
    <tr>
        <td><form class="form-inline"><label>検索：<input type="text" name="serch" value="武蔵小山駅"></label><button type="button" onClick="url2latlng(35.620507, 139.704413)">再検索</button></form></td>
    </tr>
    <tr>
        <td><div id="map" class="mp"></div>
    </tr>
    <tr>
        <td class="list">
            <table id="search_list">
            </table>
        </td>
    </tr>
</table>
<style>
    .ok{
        color: blue;
    }
    .ng {
        color: red;
    }
    html,body{
        margin: 0;
        padding: 0;
        width: 100%;
        height: 100%;
    }
    html{
        overflow: hidden;
    }    

    body{  
        overflow: scroll;
    }
    .list,{
        height: 50%;
    }

    .table, .search_list{
        width: 100%;
    }

    .search_list{    
        border: 1px solid black;
    }
    .c-1, .c-3{
        width: 20%;
    }

    .c-3 img{
        width: 90%;
    }
</style>
<script>
var map, geojsonLayer;
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
    map = L.map('map').setView([35.617264, 139.73176], 14);
    //OSMレイヤー追加
    L.tileLayer(
        '//{s}.tile.openstreetmap.org/{z}/{x}/{y}.png'
        ,{
            attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a>',
            maxZoom: 18
        }
    ).addTo(map);
    geojsonLayer = new L.geoJson(null, {
       pointToLayer: function(feature, latlng) {
            console.log(feature, latlng);
       },
       onEachFeature: function (feature, layer) {
           layer.bindPopup(feature.properties.park_name + '<br />' + feature.properties.park_name_rm);
       }
    }).addTo(map);

    if (gps){
        navigator.geolocation.getCurrentPosition(function(pos){
            console.log(pos);    
            var lat = pos.coords.latitude;
            var lng = pos.coords.longitude;
            url2latlng(lat, lng);
        }, 
        function(pos){
            console.log(pos);
        } , {

        });
    }else{
        url2latlng();
    }
});

function url2latlng(lat, lng){
    lat = lat || 35.620507;
    lng = lng || 139.704413;
    var url = "/park_lists/geojson/" + lat + "/" + lng;
    map.setView(new L.LatLng(lat, lng), 16);
    makeList(url);
}

function makeList(url){
    geojsonLayer = new L.GeoJSON.AJAX(url,{ }).addTo(map);
    $.getJSON(url,function(data){
        var fs = data.features;
        console.log(url,fs);
        $("#search_list").empty();
        for (var i =0; i < fs.length; i++){
            var p = fs[i].properties;
            var id = p.id; 
            var dt = '<tr> <td rowspan="3" class="c-1"><a href="/details/items/' + id + '"><img src="/img/icons/number_' +  (i + 1) + '.png"></a></td> <td class="c-2">' + p.park_name + '</td> <td rowspan="3" class="c-3"><img src="/img/photos/1.jpg"> </td> </tr> <tr> <td class="c-2">' + p.park_name_rm + '</td> </tr> <tr> <td class="c-2"> <div class="ok">遊具,多目的トイレ,ベンチ</div> <div class="ng">自転車,ボール</div> </td> </tr>';
            $("#search_list").append(dt);
        }
        
    });
}
</script>
