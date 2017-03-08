<div class="wrapper wrapper-full-page">
    <div class="full-page login-page" data-color="orange" data-image="<?php echo asset_url_admin(); ?>img/full-screen-image-1.jpg">   
        
    <!--   you can change the color of the filter page using: data-color="blue | azure | green | orange | red | purple" -->
        <div class="content">
            <div class="container">
                <div class="row">                   
                    <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
                        <form method="POST" action="" id="login">
                            
                        <!--   if you want to have the card without animation please remove the ".card-hidden" class   -->
                            <div class="card card-hidden">
                                <div class="header text-center">Login</div>
                                <?=$message!=''?'<div class="content erros">'.$message.'</div>':'';?>
                                <div class="content">
                                    <div class="form-group">
                                        <?php echo lang('login_identity_label', 'identity');?>
                                        <?php echo form_input($identity);?>
                                    </div>
                                    <div class="form-group">
                                        <?php echo lang('login_password_label', 'password');?>
                                        <?php echo form_input($password);?>
                                    </div>                                    
                                    <div class="form-group">
                                        <label class="checkbox">Lembrar-me <?php echo form_checkbox('remember', '1', FALSE, 'id="remember" data-toggle="checkbox"');?></label>
                                    </div>
                                </div>
                                <div class="footer text-center">
                                    <button type="submit" class="btn btn-fill btn-warning btn-wd">Login</button>
                                </div>
                                <div class="esqueci_a_senha">
                                    <a href="<?=base_url()?>esqueci-a-senha"><?php echo lang('login_forgot_password');?></a>
                                </div>
                            </div>
                                
                        </form>
                                
                    </div>                    
                </div>
            </div>
        </div>

    </div>                             
       
</div>