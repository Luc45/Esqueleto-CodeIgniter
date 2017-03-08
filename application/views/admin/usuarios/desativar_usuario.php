<div class="content">
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Desativar Usuário <small><?php echo sprintf(lang('deactivate_subheading'), $user->username);?>?</small></h4>
                        </div>
                        <div class="content">

                            <form method="POST">

                              <p>
                                <?php echo lang('deactivate_confirm_y_label', 'confirm');?>
                                <input type="radio" name="confirm" value="yes" checked="checked"/>
                                <?php echo lang('deactivate_confirm_n_label', 'confirm');?>
                                <input type="radio" name="confirm" value="no"/>
                              </p>

                              <?php echo form_hidden($csrf); ?>
                              <?php echo form_hidden(array('id'=>$user->id)); ?>

                              <input type="submit" class="btn btn-primary" value="Enviar">

                            </form>

                        </div><!-- end content-->
                    </div><!--  end card  -->
                </div> <!-- end col-md-12 -->

        </div>
    </div>
</div>