<div class="container">
    <div class="main_contents">
        <center>
            <div class="main_title center-block">
                <?php echo $park_list["ParkList"]["park_name"]; ?><br>
            </div>
            (<?php echo $park_list["ParkList"]["park_name_rm"]; ?>)
        </center>
        <table class="menu">
            <tr>
                <td class="post"><a href="/details/items/<?php echo $park_list_id; ?>">基本情報</td>
                <td class="map"><a href="/posts/view/<?php echo $park_list_id; ?>"> みんなの報告</a></td>
                <td class="post"><a href="/posts/add/<?php echo $park_list_id; ?>">いったよを報告する</a></td>
            </tr>
        </table>
        <br>
        <br>
        <div class="posts form">
    <?php
    //    print_r($park_list["Post"]);
    $opt_age = array( "0歳児", "1歳児", "2歳児", "3歳児", "4歳児", "5歳児", "6歳児");
    $posts = $park_list["Post"];

    foreach ($posts as $key => $post){
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
        printf("<dt>%s", date('Y年m月d日',strtotime($post["created"])));
        printf("<span class='emoji'>%s</span></dt><br>", $rank_data);
        printf("<dd>%s</dd><br>", $post["message"]);
        if (!empty($image)){
            printf("<img src='%s' class='post_image'><br>", $image);
        }
        printf("# %s", $age_info);
        print("</div>");
        /* */
    }
    ?>
        </div>
    </div>
</div>
