<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=<?php echo Configure::read('google_apikey'); ?>&callback=initialize">
</script>
<div class="container">
<div class="main_contents">
<center>
<div class="main_title center-block">
    <?php echo $park_list["ParkList"]["park_name"]; ?><br>
</div>
 (<?php echo $park_list["ParkList"]["park_name_rm"]; ?>)
</center>
<table class="menu">
    <tr>
        <td class="map">基本情報</td>
        <td class="post"><a href="/posts/view/<?php echo $park_list["ParkList"]["id"]; ?>"> みんなの報告</a></td>
        <td class="post"><a href="/posts/add/<?php echo $park_list["ParkList"]["id"]; ?>"> いったよを報告する</a></td>
    </tr>
</table>
<script>
<?php 
$latitude = $park_list["ParkList"]["latitude"];
$longitude =  $park_list["ParkList"]["longitude"];
printf("var lat=%s, lng=%s;\n", $latitude, $longitude);
?>
var panorama;
function initialize(){
    panorama = new google.maps.StreetViewPanorama(
        document.getElementById('streetview'), {
        position: {lat: lat, lng: lng},
        pov: {heading: 165, pitch: 0},
        zoom: 1
    });
}
</script>  
    <div class="row">
        <div id="streetview"></div><br>
        住所：<br>
        <p>東京都品川区<?php echo $park_list["ParkList"]["address"]; ?>&nbsp;
        <a href="https://www.google.co.jp/maps/@<?php echo $latitude; ?>,<?php echo $longitude; ?>,16z" target="map">google map</a></p><br>
        公園紹介<br>
        <p><?php echo $park_list["ParkList"]["description"]; ?></p>

        </p>
        基本情報：<br>
        <div class="permit row">
<?php
    $details = $park_list["Detail"];
    foreach ($categories as $category){
        $name = $category["Category"]["name"];
        $cls = "gray";
        foreach($details as $detail){
            if ($detail["name"] == $name){
                switch ($detail["permit_flag"]){
                    case 1:
                        $cls = "green";
                        break;
                    case 2:
                        $cls = "red";
                        break;
                    default:
                        $cls = "gray";
                        break;
                }
                break;
            }
        }
        printf("        <div class='dtl col-xs-3'><div class='%s'>%s</div></div>\n", $cls, $category["Category"]["name"]);
    }
?>
        </div><br style="clear:both"><br>
