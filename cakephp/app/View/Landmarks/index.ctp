<div class="container">
    <div class="main_contents">
        <div class="main_title">    
            <p>もよりの駅から探す</p>
        </div>
        <div class="row">
            <?php
            //print_r($landmarks);
            foreach ($landmarks as $lnd){
                $landmark = $lnd["Landmark"];

                printf("<div class='col-xs-4'><a class='btn landmark' href='/map/landmark/%s'>%s</a></div>", $landmark["id"], $landmark["name"]);
            }
            ?>
        </div>
    </div>
</div>
