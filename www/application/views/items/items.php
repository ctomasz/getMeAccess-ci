<?php include(__DIR__.'/../header.php'); ?>

    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <?php
                if( $flash = $this->session->flashdata('globalMessage')){
                    ?>
                    <div class="alert alert-info"><?=$flash;?></div>
                    <?php
                }
                ?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3>Items of <i><?=$list->name;?></i></h3>
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <thead>
                            <th colspan="2" class="text-right">
                                <a href="<?=site_url(['item/create', $list->id]);?>" class="btn btn-success">add new item</a>
                                <a href="<?=site_url('lists');?>" class="btn btn-default">back to lists</a>
                            </th>
                            </thead>
                            <tbody>
                            <?php foreach($items as $item){ ?>
                            <tr>
                                <td><?=$item->name ?></td>
                                <td class="text-right">
                                    <a href="<?=site_url(['item/show', $item->id])?>" class="btn btn-primary">show credentials</a>
                                    <a href="<?=site_url(['item/edit', $item->id])?>" class="btn btn-danger">edit</a>
                                </td>
                            </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="panel-footer">
                        <strong>Logs:</strong>
                        <table class="table table-striped">
                            <?php foreach( $logs as $log) {?>
                            <tr>
                                <td class="col-xs-3" nowrap>[<?=$log->created_at;?>]</td>
                                <td class="col-xs-3"><?=$log->member;?></td>
                                <td class="col-xs-3"><?=$log->action;?></td>
                                <td class="col-xs-3"><?=$log->item_id;?></td>

                            </tr>
                            <?php } ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include(__DIR__.'/../footer.php'); ?>