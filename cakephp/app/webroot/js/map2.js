var map, geojsonLayer;
$(document).ready(function(){
    var h = $("html").height();
    var w = $("html").width();
    $("#map").height(h / 3);
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
        if (window.latitude != undefined && window.longitude != undefined){
            url2latlng(latitude, longitude);
        }
    }
});

function url2latlng(lat, lng){
    lng = lng || 139.704413;
    var url = "/park_lists/geojson/" + lat + "/" + lng;
    map.setView(new L.LatLng(lat, lng), 16);
    makeList(url);
    var frame_url = "/park_lists/frame/" + lat + "/" + lng;
    console.log(frame_url);
    $("#iframe_list").attr("src", frame_url);
}

function makeList(url){
    //geojsonLayer = new L.GeoJSON.AJAX(url,{ }).addTo(map);
    $.getJSON(url,function(data){
        console.log(data);
        geojsonLayer = new L.geoJson(data, {
            onEachFeature: function(feature, layer){
                layer.on({
                    click: function (e){
                        var id = feature.properties.id;
                        console.log(id, feature, e);
                        var url = '/details/items/' + id;
                        location.href = url;
                    }
                });
            },
            pointToLayer: function(feature, latlng) {
                console.log(feature, latlng);
                return L.marker(latlng, {icon:  new L.icon({
                    iconSize: [32, 37],
                    iconAnchor: [16, 36],
                    iconUrl: feature.properties.no_image,
                })});
            },
        }).addTo(map);
        var fs = data.features;
        console.log(url,fs);
/*
        $("#search_list").empty();
        for (var i =0; i < fs.length; i++){
            var p = fs[i].properties;
            var id = p.id; 
            var dt = '<tr> <td rowspan="3" class="c-1"><a href="/details/items/' + id + '"><img src="/img/icons/number_' +  (i + 1) + '.png"></a></td> <td class="c-2">' + p.park_name + '</td></tr> <tr> <td class="c-2">' + p.park_name_rm + '</td> </tr> <tr> <td class="c-2"> <div class="ok">遊具,多目的トイレ,ベンチ</div> <div class="ng">自転車,ボール</div> </td> </tr>';
            $("#search_list").append(dt);
        }
  
*/      
    });
}
function mm(obj){
    var lm = $("#landmark").val();
    var l = lm.split(",");
    url2latlng(l[0], l[1]);
}
