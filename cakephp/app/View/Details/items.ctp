<script async defer
         src="https://maps.googleapis.com/maps/api/js?key=<?php echo Configure::read('google_apikey'); ?>&callback=initialize">
</script>
<style>
    .title{
        font-size: 120%;
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
        width: 400px;
        border: 1px black solid;
    }

    .dtl {
        border: 1px black solid;
        text-align: center;
    }

    .green {
        color: black;
        background-color: #e3f0fb;
    }

    .red {
        color: white;
        background-color: red;
    }

    .gray{
        color: black;
        background-color: white;
    }

    #streetview{
        height: 300px;
    }
</style>
<div class="container">
    <nav class="navbar navbar-toggleable-md navbar-light bg-faded" style="padding-left:0px;">
        <a class="navbar-brand" href="/">乳幼児向け公園検索サービス</a>
    </nav>
    <div class="row">
        <div class="parkname">
            <h2 style="margin-botom:0px";><?php echo $park_list["ParkList"]["park_name"]; ?></h2>
            </br>(通称　<?php echo $park_list["ParkList"]["park_name_rm"]; ?>)
            </br> <span style="border-bottom: solid 1px black;">住所 <?php echo $park_list["ParkList"]["address"]; ?></span>
        </div></br>
        <div class="wentpark">
             <?php echo $this->Html->image('went.jpg', array('width'=>'200', 'url'=>array('action'=>'nextview'))); ?>
        </div><br>
        <div class="permit">
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
        printf("        <div class='dtl col-xs-4 %s'>%s</div>\n", $cls, $category["Category"]["name"]);
    }
?>
        </div><br style="clear:both"><br>
        <div id="streetview"></div><br>
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
      <div> <?php echo $this->Html->image('park_detail.jpg', array('width'=>'400')); ?> </div><br>
        <div> <?php echo $this->Html->image('evaluation.jpg', array('width'=>'400')); ?> </div><br>
        <div> <?php echo $this->Html->image('recommend.jpg', array('width'=>'400')); ?> </div><br>
    </div>
</div>
