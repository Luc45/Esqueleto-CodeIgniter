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
                                    <?php echo lang('forgot_password_heading');?><br>
                                    <small><?php echo sprintf(lang('forgot_password_subheading'), $identity_label);?></small>
                                </div>
                                <?=$message!=''?'<div class="content erros">'.$message.'</div>':'';?>
                                <div class="content">
                                    <div class="form-group">
                                        <label for="identity"><?php echo (($type=='email') ? sprintf(lang('forgot_password_email_label'), $identity_label) : sprintf(lang('forgot_password_identity_label'), $identity_label));?></label>
                                        <?php echo form_input($identity);?>
                                    </div>                                  
                                </div>
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