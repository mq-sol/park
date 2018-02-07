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
    $.get(frame_url,function(data){
        $("#iframe_list").empty().html(data);
    });
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
    });
}
function mm(obj){
    var lm = $("#landmark").val();
    var l = lm.split(",");
    url2latlng(l[0], l[1]);
}
