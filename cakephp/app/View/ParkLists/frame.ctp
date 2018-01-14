
<style>
.list-group td{
    padding: 4px;
}
.items{
    display: table-cell;
    padding: 5px;
}
.ok_item {
    background-color: green;
    font-weight: bold;
    color: white;
    padding: 2px; 
    font-size: 120%:
    border: 1px solid green;
    border-radius: 2px;
}

.ng_item {
    background-color: gray;
    font-weight: bold;
    color: white;
    padding: 2px; 
    font-size: 120%:
    border: 1px solid gray;
    border-radius: 2px;
}
.list{
    width: 98%;
    border-color: white solid white;
    border-radius: 3px;
    background-color: white;
}
.list td{
    padding: 3px;
}
</style>
<?php 
    foreach ($parklists as $i => $park):
?>

<div class="list-group">
<table class="list">
    <tr>
        <td>
        <a target="_parent" href="/details/items/<?php echo $park["id"] ?>"><img src="/img/icons/number_<?php echo ($i + 1); ?>.png"></a>

<?php echo $park["park_name"]?>(<?php echo $park["park_name_rm"]; ?>)</td>
    </tr>
    <tr>
        <td><?php echo $park["description"]; ?></td>
    </tr>
    <tr>
        <td>
    <?php
        $oks =explode(",",str_replace(array('{','}'),'',$park["ok"]));
        foreach ($oks as $ok){
            if (empty($ok)) break;
            printf("<div class='items'><div class='ok_item'>%s</div></div>", $ok);
        }
    ?>
        </td>
    </tr>
    <tr>
        <td>
    <?php
        $ngs =explode(",",str_replace(array('{','}'),'',$park["ng"]));
        foreach ($ngs as $ng){
            if (empty($ng)) break;
            printf("<div class='items'><div class='ng_item'>%s</div></div>", $ng);
        }
    ?>
        <td>
    </tr>
</table>
</div>
<?php
    endforeach;
?>
