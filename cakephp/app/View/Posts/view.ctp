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
    $opt_age = array(
        "0歳児",
        "1歳児",
        "2歳児",
        "3歳児",
        "4歳児",
        "5歳児",
        "6歳児");
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
            $rank_data = "いいね";
        }else if ($post["rank"] == -1){
            $rank_data = "うーん";
        }else{
            $rank_data = "";
        }

        /* */
        print("<div class='post_data'>");
        printf("投稿日時：%s <br>", $post["created"]);
        printf("投稿内容：%s <br>", $post["message"]);
        printf("評価：%s <br>", $rank_data);
        printf("一緒に行った子：%s", $age_info);
        print("</div>");
        /* */
    }
    ?>
    </div>
</div>
</div>
