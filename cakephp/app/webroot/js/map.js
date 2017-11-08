    var map = L.map('map').setView([35.617264, 139.73176], 14);
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
            map.setView(new L.LatLng(lat, lng), 16);
            var url = "/park_lists/geojson/" + lat + "/" + lng;
            var geojsonLayer = new L.GeoJSON.AJAX(url).addTo(map,{
                pointToLayer: function(feature, latlng) {
                    console.log(feature, latlng);
                },
               onEachFeature: function (feature, layer) {
                   layer.bindPopup(feature.properties.park_name + '<br />' + feature.properties.park_name_rm);
               }
            });
            makeList(url);
        }, 
        function(pos){
            console.log(pos);
        } , {

        });
    }else{
        var url = "/park_lists/geojson/";
        var geojsonLayer = new L.GeoJSON.AJAX(url).addTo(map);
        makeList(url);
    }
});

function makeList(url){
    $.getJSON(url,function(data){
        var fs = data.features;
        console.log(url,fs);
        $("#search_list").empty();
        for (var i =0; i < fs.length; i++){
            var p = fs[i].properties;
            
            var dt = '<tr> <td rowspan="3" class="c-1"><img src="/img/icons/number_' +  (i + 1) + '.png"></td> <td class="c-2">' + p.park_name + '</td> <td rowspan="3" class="c-3"><img src="/img/photos/1.jpg"> </td> </tr> <tr> <td class="c-2">' + p.park_name_rm + '</td> </tr> <tr> <td class="c-2"> <div class="ok">遊具,多目的トイレ,ベンチ</div> <div class="ng">自転車,ボール</div> </td> </tr>';
            $("#search_list").append(dt);
        }
        
    });
}
