<?php 
    foreach ($parklists as $i => $park):
?>

<div class="list-group">
<table class="list">
    <tr>
        <td>
            <a target="_parent" href="/details/items/<?php echo $park["id"] ?>"><img src="/img/icons/number_<?php echo ($i + 1); ?>.png"></a>
            <a target="_parent" href="/details/items/<?php echo $park["id"] ?>"><?php echo $park["park_name"]?>(<?php echo $park["park_name_rm"]; ?>)</a>
            [<?php echo number_format($park["len"],0); ?>m]
        </td>
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
