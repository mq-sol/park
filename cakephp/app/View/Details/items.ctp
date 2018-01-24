<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=<?php echo Configure::read('google_apikey'); ?>&callback=initialize">
</script>
<style>
    .graph dt{  
      padding : 5px;
      height: 30px;    
      width : 80px;
    /* 左寄せ */
      float : left;
    /* float解除 */
      clear : both;
    }
     
    .graph dd{    
      padding : 5px;
      height: 30px;
      width : 300px;
    /* dtの幅分の設定 */
      margin-left : 80px;
    }

    dd .gh_border{
        background-color: lightgray;
        font-size: 90%;
    }

    .container-small{
        max-width: 400px;
    }

    .title{
        font-size: 120%;
    }

    .font-large{
        font-size: 200%;
    }
    .square_btn{
        display: block;
        padding: 0.5em 1em;
        margin: 0 auto;
        text-decoration: none;
        background: #668ad8;/*ボタン色*/
        color: #FFFFFF;/*ボタン色より暗く*/
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.29);
        border-bottom: solid 3px #627295;
        border-radius: 3px;
        font-weight: bold;
        font-size: 160%;
        text-shadow: 1px 1px 1px rgba(255, 255, 255, 0.5);
    }

    .square_btn:active   {
        -ms-transform: translateY(4px);
        -webkit-transform: translateY(4px);
        transform: translateY(4px);
        box-shadow: 0px 0px 1px rgba(0, 0, 0, 0.2);
        border-bottom: none;
    }

    .row {
        width: 100%;
        margin: 15px auto;
    }

    table.type01 td {
      text-align: center;
    }

    div.parkname {
      /*float:left;*/
      width:200px;
    }

    div.wentpark {
      /*float:right;*/
      width:200px;
    }

    h2 {
      margin-bottom: 0px;
    }

    .permit {
        width: 100%;
    }

    .dtl {
        text-align: center;
        padding: 3px;
    }

    .green {
        color: white;
        background-color: #85e024;
        border: 1px solid #85e024;
        padding: 2px;
        border-radius: 5px
    }

    .red {
        color: white;
        background-color: red;
        border: red 1px solid;
        padding: 2px;
        border-radius: 5px
    }

    .gray{
        color: white;
        background-color: gray;
        border: gray 1px solid;
        padding: 2px;
        border-radius: 5px
    }

    #streetview{
        height: 300px;
        width: 100%;
    }

    .rank {
        height: 60px;
        background: url('/img/bg.png') repeat-x;
        margin: 2px;
        border-left: 1px solid #D2C6C6;
        border-right: 1px solid #D2C6C6;
        border-radius: 5px;        /* CSS3草案 */  
        -webkit-border-radius: 5px;    /* Safari,Google Chrome用 */  
        -moz-border-radius: 5px;   /* Firefox用 */ 
        text-align: center;
        padding-top: 5px;
    }

.menu {
    width: 100%;
}
.menu td {
    width: 33%;
    padding: 10px;
}

.memu td {

}
.menu .map{
    background-color: #FFBC61; 
    color: white;
    font-size: 120%;
    text-align: center;
    
}

.menu .post{
    background-color: gray;
    color: white;
    font-size: 120%;
    text-align: center;
    border: gray solid 1px;
}

.menu .post a{
    color: white;
    font-size: 120%;
    text-align: center;
}

</style>
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
