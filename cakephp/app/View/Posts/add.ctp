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
        width: 100%;
    }

    .dtl {
        text-align: center;
        padding: 3px;
    }

    .green {
        color: white;
        background-color: #85e024;
        border: 1px solid #85e024;
        padding: 2px;
        border-radius: 5px
    }

    .red {
        color: white;
        background-color: red;
        border: red 1px solid;
        padding: 2px;
        border-radius: 5px
    }

    .gray{
        color: white;
        background-color: gray;
        border: gray 1px solid;
        padding: 2px;
        border-radius: 5px
    }

    #streetview{
        height: 300px;
        width: 100%;
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

.menu {
    width: 100%;
}
.menu td {
    width: 50%;
    padding: 10px;
}

.memu td {

}
.menu .map{
    background-color: #FFBC61; 
    color: white;
    font-size: 120%;
    text-align: center;
    
}

.menu .post{
    background-color: gray;
    color: white;
    font-size: 120%;
    text-align: center;
    border: gray solid 1px;
}

.menu .post a{
    color: white;
    font-size: 120%;
    text-align: center;
}
 
.posts {
    overflow-y: scroll;
}
body{
    height: 100%;
}
</style>

<div class="container">
<div class="main_contents">
<center>
<div class="main_title center-block">
  行ったよを報告する 
</div>
</center>
<table class="menu">
    <tr>
        <td class="post"><a href="/details/items/<?php echo $park_list_id; ?>">基本情報</a></td>
        <td class="map">みんなの報告</td>
    </tr>
</table>
<br>
<br>
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
        <div class="form-group row">
            <label for="PostAge" class="control-label col-xs-5">お子さんの年齢は？（必須）</label>
            <div class="col-xs-5">
                <?php echo $this->Form->select('age', $opt_age, array('class' => 'form-control')); ?>
            </div>
        </div>
        <br>
        <div class="form-group row">
            <label for="PostRank" class="control-label col-xs-5">この公園の評価は？（必須）</label>
            <div class="col-xs-5">
                <?php echo $this->Form->select('rank', $opt_rank, array('class' => 'form-control')); ?>
            </div>
        </div>
        <br>
        <div class="form-group row">
            <label for="PostPhotoPath" class="control-label col-xs-5">写真をアップしますか？（自由）</label>
            <div class="col-xs-5">
                <?php //echo $this->Form->file('photo_path', array('class' => 'form-control')); ?>
            <h6>※この写真は公園検索サービス及びSNSに公開されます。
            お子様及び周辺の方々のプライバシーにご配慮ください。</h6>
            </div>
        </div>
        <br>
        <div class="form-group row">
            <label for="PostMessage" class="control-label col-xs-5">口コミを書く（自由）</label>
            <div class="col-xs-5">
                <?php echo $this->Form->input('message',array('class' => 'form-control')); ?>
            </div>
        </div>
        <br>
        <div class="form-group row">
            <div class="col-xs-offset-5 col-xs-5">
              <input type="submit" class="btn btn-primary" value="<?php echo __("行ったよを投稿する。"); ?>">
            </div>
        </div>
        </fieldset>
    <?php echo $this->Form->end(); ?>
    </div>
</div>
</div>
