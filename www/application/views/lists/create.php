<?php include(__DIR__.'/../header.php'); ?>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading"><h4>New list</h4></div>
                <div class="panel-body">
                    <?php if( validation_errors() != '' ) { ?>
                        <div class="alert alert-danger">
                            <ul>
                                <?php echo validation_errors('<li>','</li>')?>
                            </ul>
                        </div>
                    <?php } ?>
                    <?php echo form_open('list/store'); ?>

                    <div class="form-group">
                        <label for="exampleInputEmail1">List name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Name of new list" name="list_name">
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include(__DIR__.'/../footer.php'); ?>