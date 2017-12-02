<div class="container">
    <nav class="navbar navbar-toggleable-md navbar-light bg-faded" style="padding-left:0px;">
        <a class="navbar-brand" href="/">乳幼児向け公園検索サービス</a>
    </nav>
    <div class="posts form">
    <?php echo $this->Form->create('Post', array(
        'inputDefaults' => array(
            'label' => false,
            'div' => false
        )
    )); ?>
        <fieldset>
        <?php
            $opt_age = array("0" => "0歳児", "1" => "1歳児", "2" => "2歳児", "3" => "3歳児", "4" => "4歳児", "5" => "5歳児", "6" => "6歳児");
            $opt_rank = array(
                "1" => str_repeat("☆",1), 
                "2" => str_repeat("☆",2), 
                "3" => str_repeat("☆",3), 
                "4" => str_repeat("☆",4), 
                "5" => str_repeat("☆",5), 
                "0" => "評価しない",
            );          
            echo $this->Form->hidden('park_list_id', array('value' => $park_list_id));
        ?>
        <div class="form-group">
            <label for="PostAge" class="control-label col-xs-5">お子さんの年齢は？（必須）</label>
            <div class="col-xs-5">
                <?php echo $this->Form->select('age', $opt_age, array('class' => 'form-control')); ?>
            </div>
        </div>
        <div class="form-group">
            <label for="PostRank" class="control-label col-xs-5">この公園の評価は？（必須）</label>
            <div class="col-xs-5">
                <?php echo $this->Form->select('rank', $opt_rank, array('class' => 'form-control')); ?>
            </div>
        </div>
        <div class="form-group">
            <label for="PostPhotoPath" class="control-label col-xs-5">写真をアップしますか？（自由）</label>
            <div class="col-xs-5">
                <?php //echo $this->Form->file('photo_path', array('class' => 'form-control')); ?>
            <h6>※この写真は公園検索サービス及びSNSに公開されます。
            お子様及び周辺の方々のプライバシーにご配慮ください。</h6>
            </div>
        </div>
        <div class="form-group">
            <label for="PostMessage" class="control-label col-xs-5">口コミを書く（自由）</label>
            <div class="col-xs-5">
                <?php echo $this->Form->input('message',array('class' => 'form-control')); ?>
            </div>
        </div>
        <div class="form-group">
            <div class="col-xs-offset-5 col-xs-5">
              <input type="submit" class="btn btn-primary" value="<?php echo __("行ったよを投稿する。"); ?>">
            </div>
        </div>
        </fieldset>
    <?php echo $this->Form->end(); ?>
    </div>
</div>
