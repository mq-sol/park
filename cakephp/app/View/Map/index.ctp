<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/leaflet/1.2.0/leaflet.css" />
<script src="//cdnjs.cloudflare.com/ajax/libs/leaflet/1.2.0/leaflet.js"></script>
<script src="/js/leaflet.ajax.js"></script>
<script src="/js/map2.js"></script>
<script>
<?php if (!empty($method)){
    print("var gps=true;\n");
}else{
    print("var gps=false;\n");
}
?>
</script>
<div class="container">
    <div class="main_contents">
        <div class="main_title">
            <p>現在地から探す</p>
        </div>
        <div id="map" class="mp"></div>
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
