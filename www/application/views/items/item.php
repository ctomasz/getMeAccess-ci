<div class="panel panel-default">
    <div class="panel-heading">
        <h3><?=$item->name;?></h3>
    </div>
    <div class="panel-body">
        <?=$item->content;?>
    </div>
    <div class="panel-footer text-right">
        [Created: <?=$item->created_at?>] | [Updated: <?=$item->updated_at?>]
    </div>
</div>