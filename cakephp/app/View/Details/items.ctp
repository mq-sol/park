<link rel="stylesheet" type="text/css" href="/js/slick/slick.css" media="screen" />
<link rel="stylesheet" type="text/css" href="/js/slick/slick-theme.css" media="screen" />
<script src="/js/slick/slick.min.js"></script>
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
$(function() {
    $('.thumb-item-nav').slick({
        dots: true,
        infinite: true,
        speed: 300,
        slidesToShow: 1,
        adaptiveHeight: true
    });
});

</script>
    <div class="row">
        公園紹介<br>
        <p><?php echo $park_list["ParkList"]["description"]; ?></p>
        <center>
        <?php if (!empty($park_list["Photo"])) : ?>
            <ul class='slider thumb-item-nav'>
        <?php
            $photo_dir = WWW_ROOT . "img" .DS . "photos" . DS;
            foreach ($park_list["Photo"] as $photos){
                $photo_url = $photos["photo_url"];
                $photo_path = $photo_dir . $photo_url;
                if (is_file($photo_path)){
                    $photo_link = "/img/photos/" . $photo_url;
                    printf("<li><img src=\"%s\" class=\"park_photo\"></li>\n", $photo_link);
                }
            }
        ?>
            </ul>
        <?php else: ?>
            <img src="/img/noimage.png" class="park_noimage">
        <?php endif; ?>
        </center>
        <a class="gmap" href="http://maps.google.com/maps?q=<?php echo $latitude; ?>,<?php echo $longitude; ?>" target="map">&nbsp;</a>
        <a class="walk" href="http://maps.google.com/maps?saddr=現在地&daddr=<?php echo $latitude; ?>,<?php echo $longitude; ?>&dirflg=w" target="map">&nbsp;</a></p><br>

        </p>
        基本情報：<br>
        <div class="permit row">
<?php
    $details = $park_list["Detail"];
    $icon_path = "/img/marks/";
    foreach ($categories as $category){
        $name = $category["Category"]["name"];
        $icon = $icon_path . $category["Category"]["icon_name"];
        $cls = "gray";
        $icon_name = sprintf($icon, "n");
        foreach($details as $detail){
            if ($detail["name"] == $name){

                switch ($detail["permit_flag"]){
                    case 1:
                        $cls = "green";
                        $icon_name = sprintf($icon, "a");
                        break;
                    case 2:
                        $cls = "red";
                        $icon_name = sprintf($icon, "n");
                        break;
                    default:
                        $cls = "gray";
                        $icon_name = sprintf($icon, "n");
                        break;
                }
                break;
            }
        }
        printf("        <div class='dtl col-xs-2'><img class='icon_marks %s' title='%s' src='%s'></div>\n",
                            "", $category["Category"]["name"], $icon_name);
    }
?>
        </div><br style="clear:both"><br>
