<?php include(__DIR__.'/../header.php'); ?>

<div class="container">
    <h1>Authentication</h1><hr>

    <div class="row">
        <div class="col-xs-6">

            <div class="panel panel-default">
                <div class="panel-heading">Sign In</div>
                <div class="panel-body">
                    <?php if( isset($signInErrorMessage) && ( validation_errors() != '' || !empty($signInErrorMessage)) ) { ?>
                        <div class="alert alert-danger">
                            <ul>
                                <?php echo validation_errors('<li>','</li>')?>
                                <?php echo $signInErrorMessage; ?>
                            </ul>
                        </div>
                    <?php } ?>
                    <?php echo form_open('auth/signin'); ?>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" name="email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
                        </div>
                        <button type="submit" class="btn btn-default">Submit</button>
                    </form>
                </div>
                <div class="panel-footer text-right">
                    <a href="<?=site_url('auth/forgotpassword')?>" class="link">for got password</a>
                </div>
            </div>
        </div>
        <div class="col-xs-6">
            <div class="panel panel-default">
                <div class="panel-heading">Sign Up</div>
                <div class="panel-body">
                    <?php if( isset($signUpErrorMessage) && ( validation_errors() != '' || !empty($signUpErrorMessage)) ) { ?>
                        <div class="alert alert-danger">
                            <ul>
                                <?php echo validation_errors('<li>','</li>')?>
                                <?php echo $signUpErrorMessage; ?>
                            </ul>
                        </div>
                    <?php } ?>
                    <?php echo form_open('auth/signup'); ?>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" name="email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword2">Confirm Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Password" name="password_confirm">
                        </div>
                        <button type="submit" class="btn btn-default">Submit</button>
                    </form>
                </div>
            </div>


        </div>
    </div>
</div>

<?php include(__DIR__.'/../footer.php'); ?>


