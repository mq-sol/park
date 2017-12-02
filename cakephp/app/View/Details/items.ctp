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
        width: 400px;
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
</style>
<div class="container-small">
    <nav class="navbar navbar-toggleable-md navbar-light bg-faded" style="padding-left:0px;">
        <a class="navbar-brand" href="/">乳幼児向け公園検索サービス</a>
    </nav>
    <div class="row">
        <div class="parkname">
            <h2 style="margin-botom:0px; white-space: nowrap;"><?php echo $park_list["ParkList"]["park_name"]; ?></h2>
            </br>(通称　<?php echo $park_list["ParkList"]["park_name_rm"]; ?>)
            </br> <span style="border-bottom: solid 1px black;">住所 <?php echo $park_list["ParkList"]["address"]; ?></span>
        </div></br>
        <div class="wentpark">
             <?php echo $this->Html->image('went.jpg', array('width'=>'200', 
                'url'=>array('controller' => 'posts','action'=>'add', $park_list["ParkList"]["id"]))); ?>
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
      <div><?php
        /*
        $photos = $park_list["Photo"];
        if (empty($photos)){
            echo $this->Html->image('noimage.png', array('width' => 400));
        }else{
            $photo = array_shift($photos);
            echo $this->Html->image($photo['path'], array('width' => 400));
        }
        */
        ?></div><br>
        <h3>みんなの評価</h3>
        <?php
            $posts = $park_list["Post"];
            $post_count = 0;
            $post_count = count($posts);
            $ranks = $park_list["Rank"];
            $rank_avg = 0;
            
            foreach($ranks as $rank){
                $rank_avg += $rank["rank"];
            }
            if (count($ranks)){
                $rank_avg = number_format($rank_avg / count($ranks),2);
            }
           
            $total = 0; 
            foreach($rank_lists as $rank){
                $total += $rank["age_list"];
            }
            $rank_avg = number_format($total / 7, 2);
        ?>
        <div class="col-xs-6">
            <div class="rank">
            <span>満足度</span><span class="font-large"><?php echo $rank_avg ?></span>
            </div>
        </div>
        <div class="col-xs-6">
            <div class="rank">
            <span>クチコミ件数</span><span class="font-large"><?php echo $post_count ?></span><span>件</span>
            </div>
        </div>
        <br style="clear:both">
        <div class="col-xs-12 graph">
<?php
    //print_r($rank_lists);
?>
            <?php
                foreach($rank_lists as $rank){
                    $age = $rank["age_list"];
                    $avg = $rank["avg"];
                    $width = empty($avg) ? 15 : $avg * 20;
                    $tpl='<dt>%d歳児</dt><dd><div class="gh_border" style="width:%dpx">%d</div></dd>'. "\n";
                    printf($tpl, $age, $width, $avg);
                }
            ?>
        </div>
        <br style="clear:both">
        <div style="margin: 4px;padding: 6px;"><h4>みんなの口コミ</h4></div>
        <ul class="list-group">
<?php
        $star = "☆";
        foreach ($posts as $post){
            printf("<li class='list-group-item'>%s<br>年齢：%s歳児 評価: %s 投稿日 %s</li>", 
                $post["message"], $post["age"], str_repeat($star, $post["rank"]), $post["created"]); 
        }
?>
        </ul>
        <div clas="col-xs-12">
        </div>
    </div>
</div>
