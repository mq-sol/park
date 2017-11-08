<style>
    .title{
        font-size: 120%;
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

</style>
<div class="container">

    <nav class="navbar navbar-toggleable-md navbar-light bg-faded" style="padding-left:0px;">
        <a class="navbar-brand" href="/">乳幼児向け公園検索サービス</a>
    </nav>

    <div class="row">

        <!-- <div class="col-sm-5 divbtn">
            <a href="/map/gps/" class="square_btn">現在地からさがす</a>
        </div>
        -->
        <div class="parkname">
          <h2 style="margin-botom:0px";>サンプル公園</h2>
          </br>(通称　サンプルあそびば公園)
          </br> <span style="border-bottom: solid 1px black;">住所 品川区品川1-1-1</span>
        </div>
      </br>
<!--
        <div class="col-sm-2 divbtn"></div>
        <div class="col-sm-5 divbtn">
            <a href="#" class="square_btn">行ったよ！する</a>
        </div>
-->

<div>
  <?php //echo $this->Html->image('parkattribute.jpg', array('width'=>'400')); ?>
</div>

        <div class="wentpark">
          <?php echo $this->Html->image('went.jpg', array('width'=>'200', 'url'=>array('action'=>'nextview'))); ?>
        </div>

        <div class="col-sm-2 divbtn"></div>
    </div>

<div>

      <table class="type01" width="400px" class="table3" border=1>
        <tr>
          <td bgcolor="#e3f0fb">トイレ</td><td>多</td><td>オムツ</td>
        </tr>
        <tr>
          <td>広さ</td><td bgcolor="#e3f0fb">芝生</td><td bgcolor="#e3f0fb">すべり台</td>
        </tr>
        <tr>
          <td bgcolor="#e3f0fb">ブランコ</td><td>てつぼう</td><td>砂場</td>
        </tr>
        <tr>
          <td>散策</td><td>穴</td><td bgcolor="#e3f0fb">水遊び</td>
        </tr>
        <tr>
          <td>ボール</td><td>ドッグラン</td><td>木登り</td>
        </tr>
      </table>
    </div>
</br>
<iframe src="https://www.google.com/maps/embed?pb=!1m0!4v1509870785218!6m8!1m7!1sSn1NauAxPQ_DY8wdSsbUIQ!2m2!1d35.61589112816224!2d139.7082307089908!3f207.75596365969844!4f0!5f0.7820865974627469" width="400" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>
</br>
    <div>
      <?php echo $this->Html->image('park_detail.jpg', array('width'=>'400')); ?>
    </div>
  </br>
</br>
    <div>
      <?php echo $this->Html->image('evaluation.jpg', array('width'=>'400')); ?>
    </div>


  </br>
</br>
    <div>
      <?php echo $this->Html->image('recommend.jpg', array('width'=>'400')); ?>
    </div>

<!--
    <div class="tw">
        <a class="twitter-timeline" href="https://twitter.com/park_shinagawa?ref_src=twsrc%5Etfw">Tweets by TwitterDev</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
    </div>
-->

</div>
