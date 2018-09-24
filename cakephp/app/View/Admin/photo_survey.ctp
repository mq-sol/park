<div class="row">
    <div class="col-xs-4 page">
    <?php echo $this->Paginator->prev('前へ' . __(''), array(), null, array('class' => 'prev disabled')); ?>
    <?php echo $this->Paginator->counter(array( 'format' => __('{:page}/{:pages}ページを表示'))); ?>
    <?php echo $this->Paginator->next(__('') . ' 次へ', array(), null, array('class' => 'next disabled')); ?>
    </div>
    <div class="col-xs-4">
        <button class="btn dl" type="button">チェックを付けたものをダウンロードする</button>
    </div>
    <div class="col-xs-4">
        <button class="btn pk" type="button">チェックを付けたものを公園情報に公開する</button>
    </div>
</div>
<?php echo $id ?>
<div class="row">
<?php foreach ($lists as $row): ?>
    <div class="col-xs-3 cl">
<?php
    printf("<input class='form-control chk' type=\"checkbox\" name=\"sel\" value=\"%d\">", $row["ParkSurveyPhoto"]["id"]);
    printf("<img class='photo' src='%s'>", "/survey_photos/" . $row["ParkSurveyPhoto"]["file_path"]);
?>
    </div>
<?php endforeach; ?>
</div>
<style>
.page {
    font-size: 120%;
}
.photo{
    width: 90%;
    margin-bottom: 10px;
}
.cl{
    position: relative;
}
.chk{
    position: absolute;
    top: 3px;
    left: 20px;
    width: 30px;
}

</style>
<script>
    var id = "<?php echo $id ?>";
    $(".dl").on("click",function(){
        var chk = [];
        $(".chk").each(function(){
            var flg = $(this).prop("checked");
            console.log(flg);
            if (flg){
                var val = $(this).val();
                chk.push(val);
            }
        });
        console.log(chk);
        $.post("/admin/photo_dl/" + id, {lists: chk}, function(data){
            console.log(data);
            var url = "/admin/zip_dl/" + data;
            location.href = url;
        });
    });
</script>

