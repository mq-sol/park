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
</style>
<div class="container">
    <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
        <a class="navbar-brand" href="#">乳幼児向け公園検索サービス</a>
    </nav>

    <div class="row">

        <div class="col-sm-5 divbtn">
            <a href="/map/gps/" class="square_btn">現在地からさがす</a>
        </div>
        <div class="col-sm-2 divbtn"></div>
        <div class="col-sm-5 divbtn">
            <a href="#" class="square_btn">最寄り駅からさがす</a>
        </div>
        <div class="col-sm-2 divbtn"></div>
    </div>
    <div class="title">みんなの公園に行ったよ報告</div>
    <div class="tw">
       
        <a class="twitter-timeline" href="https://twitter.com/park_shinagawa?ref_src=twsrc%5Etfw">Tweets by TwitterDev</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script> 
    </div>
</div>
