<style>
.main_title p{
    margin: 0 auto;
    text-align: center;
}
</style>
<?php
    //echo $this->element("header");
?>
<div class="container">
    <div class="main_contents">
        <center>
            <div class="row">
                <div class="col-xs-6 divbtn">
                    <a href="/map/gps/" class="square_btn gps">現在地から探す</a>
                </div>
                <div class="col-xs-6 divbtn">
                    <a disabled href="/landmarks/" class="square_btn station">最寄り駅から探す</a>
                </div>
            </div>
        </center>
        <div class="title">みんなの公園に行ったよ報告</div>
        <div class="posts form top_image">
        <?php
        $opt_age = array( "0歳児", "1歳児", "2歳児", "3歳児", "4歳児", "5歳児", "6歳児");

        foreach ($posts as $key => $value){
            $post = $value["Post"];
            $park = $value["ParkList"];
            $park_name = $park["park_name"];
            $park_id = $park["id"];
            $park_url = "/details/items/" . $park_id;
            $age = empty($post["age"]) ? 0 : $post["age"];
            $ages = array();
            foreach ($opt_age as $key => $val){
                if ($age & pow(2,$key)){
                    $ages[] = $val;
                }
            }
            $age_info = implode(",",$ages);
            if ($post["rank"] == 1){
                $rank_data = "&#x1F44D";
            }else if ($post["rank"] == -1){
                $rank_data = "&#x1F44E";
            }else{
                $rank_data = "";
            }


            //画像の確認
            $post_path = WWW_ROOT . DS . 'photos' . DS . 'posts' . DS;
            $image_path = $post_path.$post["photo_path"];
            if (!empty($post["photo_path"]) && (is_file($post_path . $post["photo_path"]))){
                $image = "/photos/posts/" . $post["photo_path"];
            }else{
                $image = "";
            }

            /* */
            print("<div class='post_data'>");
            printf("<a href='%s'>%s</a>", $park_url, $park_name);
            printf("<dt>%s", date('Y年m月d日',strtotime($post["created"])));
            printf("<span class='emoji'>%s</span></dt><br>", $rank_data);
            printf("<dd>%s</dd><br>", $post["message"]);
            if (!empty($image)){
            //    printf("<img src='%s' class='post_image'><br>", $image);
            }
            printf("# %s", $age_info);
            print("</div>");
            /* */
        }
        ?>
        </div>
    </div>
</div>
