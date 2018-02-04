<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=<?php echo Configure::read('google_apikey'); ?>&callback=initialize">
</script>
<div class="container">
<div class="main_contents">
<center>
<div class="main_title center-block">
    みんなの報告    
</div>
</center>
<table class="menu">
    <tr>
        <td class="post"><a href="/details/items/<?php echo $park_list_id; ?>"> 基本情報</a></td>
        <td class="map">みんなの報告</td>
        <td class="post"><a href="/posts/add/<?php echo $park_list_id; ?>"> いったよを報告する</a></td>
    </tr>
</table>

</div>
</div>
