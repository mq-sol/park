<div class="row">
<table class="table col-xs-6">
<thead>
    <tr>
        <th>公園ID</th>
        <th>公園名</th>
    </tr>
</thead>
<tbody>
<?php foreach ($lists as $row): ?>
    <tr>
        <td>
                <?php echo $row["ParkSurveyPhoto"]["park_list_id"]; ?>
        </td>
        <td>
            <a href="<?php echo $row["ParkSurveyPhoto"]["park_list_id"]; ?>">
            <?php echo $row["ParkList"]["park_name"]; ?>
            </a>
        </td>
    </tr>
<?php endforeach; ?>
<tbody>
</table>
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

