<div class="content">
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title"><?php echo lang('create_user_heading');?> <small><?php echo lang('create_user_subheading');?></small></h4>
                        </div>
                        <div class="row content">
                        <form method="POST">
                            <div class="col-md-12">
                                <div class="col-md-3" style="padding-left:5px;">
                                    <div class="form-group">
                                        <?php echo lang('create_user_fname_label', 'first_name');?>
                                        <?php echo form_input($first_name);?>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <?php echo lang('create_user_lname_label', 'last_name');?>
                                        <?php echo form_input($last_name);?>
                                    </div>
                                </div>

                                <?php
                                      if($identity_column!=='email') {
                                          echo '<div class="col-md-3">';
                                          echo '<div class="form-group">';
                                          echo lang('create_user_identity_label', 'identity');
                                          echo form_error('identity');
                                          echo form_input($identity);
                                          echo '</div>';
                                          echo '</div>';
                                      }
                                ?>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <?php echo lang('create_user_company_label', 'company');?>
                                        <?php echo form_input($company);?>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <?php echo lang('create_user_email_label', 'email');?>
                                        <?php echo form_input($email);?>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <?php echo lang('create_user_phone_label', 'phone');?>
                                        <?php echo form_input($phone);?>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <?php echo lang('create_user_password_label', 'password');?>
                                        <?php echo form_input($password);?>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <?php echo lang('create_user_password_confirm_label', 'password_confirm');?>
                                        <?php echo form_input($password_confirm);?>
                                    </div>
                                </div>
                                <div class="col-md-12 text-right">
                                    <div class="form-group">
                                        <input type="submit" value="Cadastrar" class="btn btn-primary">
                                    </div>
                                </div>
                            </div>
                        </form>

                        </div><!-- end content-->
                    </div><!--  end card  -->
                </div> <!-- end col-md-12 -->

        </div>
    </div>
</div>