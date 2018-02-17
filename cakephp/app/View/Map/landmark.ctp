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
            <select class="form-control" id="order" onChange="changeOrder(this)">
                <option value="1" selected>評価の高い順</option>
                <option value="2">近い順</option>
            </select>
        </div>
        <br style="clear:both">
        <hr>
        <div id="iframe_list"> </div>
    </div>
</div>
