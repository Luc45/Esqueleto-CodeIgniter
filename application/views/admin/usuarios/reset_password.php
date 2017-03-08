<div class="wrapper wrapper-full-page">
    <div class="full-page login-page" data-color="orange" data-image="<?php echo asset_url_admin(); ?>img/full-screen-image-1.jpg">   
        
    <!--   you can change the color of the filter page using: data-color="blue | azure | green | orange | red | purple" -->
        <div class="content">
            <div class="container">
                <div class="row">                   
                    <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
                        <form method="POST" action="">
                            
                        <!--   if you want to have the card without animation please remove the ".card-hidden" class   -->
                            <div class="card card-hidden">
                                <div class="header text-center">
                                    <?php echo lang('reset_password_heading');?>
                                </div>
                                <?=$message!=''?'<div class="content erros">'.$message.'</div>':'';?>
                                <div class="content">
                                    <div class="form-group">
                                        <label for="new_password"><?php echo sprintf(lang('reset_password_new_password_label'), $min_password_length);?></label>
                                        <?php echo form_input($new_password);?>
                                    </div>     
                                    <div class="form-group">
                                        <?php echo lang('reset_password_new_password_confirm_label', 'new_password_confirm');?>
                                        <?php echo form_input($new_password_confirm);?>
                                    </div>                         
                                </div>
                                <?php echo form_input($user_id);?>
                                <?php echo form_hidden($csrf); ?>
                                <div class="footer text-center">
                                    <button type="submit" class="btn btn-fill btn-warning btn-wd">Resetar Senha</button>
                                </div>
                            </div>
                                
                        </form>
                                
                    </div>                    
                </div>
            </div>
        </div>

    </div>                             
       
</div>