<?php 
    $lnd = $landmarks["Landmark"]; 
    $lat = $lnd["lat"];
    $lng = $lnd["lng"];
?>
<script>
var gps=false;
var latitude = <?php echo $lat; ?>;
var longitude = <?php echo $lng; ?>;
</script>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/leaflet/1.2.0/leaflet.css" />
<script src="//cdnjs.cloudflare.com/ajax/libs/leaflet/1.2.0/leaflet.js"></script>
<script src="/js/leaflet.ajax.js"></script>
<script src="/js/map2.js"></script>
<div class="container">
<div class="main_contents">
<div class="main_title">    
    <p>最寄りの駅から探す</p>
</div>
<table class="table">
    <tr>
        <td>
            <h4><?php printf("%s 駅からの検索結果", $lnd["name"]); ?></h4>
        </td>
    </tr>
    <tr>
        <td><div id="map" class="mp"></div>
    </tr>
    <tr>
        <td>
        </td>
    </tr>
</table>
<div class="pull-right">
    <form class="form-inline">
    <label for="order">並べ替え： </label>
    <select class="form-control" id="order">
        <option value="1">近い順</option>
        <option value="2">評価の高い順</option>
    </select>
</div>
<br style="clear:both">
<hr>
<iframe id="iframe_list" src="/park_lists/frame/"> </iframe>
<style>
    iframe{
        width: 100%;
        border: none;
    }
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
</div>
</div>
