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
<table class="table">
    <tr>
        <td>
            <form class="form-inline">
            <label for="landmark">検索： </label>
            <select class="form-control" id="landmark">
               <?php
foreach ($landmarks as $lm){
printf("<option value=\"%s,%s\">%s</option>", $lm["Landmark"]["lat"],$lm["Landmark"]["lng"],$lm["Landmark"]["name"]);
}
                ?> 
            </select>
            <button class="btn btn-default" type="button" onClick="mm(this)">再検索</button>
            </form>
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
