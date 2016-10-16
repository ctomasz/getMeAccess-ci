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
                        <h3>Lists</h3>
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <thead>
                            <th colspan="2" class="text-right">
                                <a href="<?=site_url('list/create')?>" class="btn btn-success">add new</a>
                            </th>
                            </thead>
                            <tbody>
                            <?php foreach($items as $item) { ?>
                            <tr>
                                <td><?=$item->name ?></td>
                                <td class="text-right">
                                    <a href="<?=site_url(['list/show',$item->id]) ;?>" class="btn btn-primary">show details</a>
                                    <a href="<?=site_url('list/request');?>" class="btn btn-warning">request for access</a>
                                    <a href="<?=site_url(['list/destroy',$item->id ]);?>" class="btn btn-danger">delete</a>
                                </td>
                            </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include(__DIR__.'/../footer.php'); ?>