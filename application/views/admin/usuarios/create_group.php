<div class="content">
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title"><?php echo lang('create_group_heading');?> <small><?php echo lang('create_group_subheading');?></small></h4>
                        </div>
                        <div class="content">

                            <form method="POST">

                                  <div class="form-group">
                                        <?php echo lang('create_group_name_label', 'group_name');?> <br />
                                        <?php echo form_input($group_name);?>
                                  </div>

                                  <div class="form-group">
                                        <?php echo lang('create_group_desc_label', 'description');?> <br />
                                        <?php echo form_input($description);?>
                                  </div>
                                  <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="Criar Grupo">
                                  </div>

                            </form>

                        </div><!-- end content-->
                    </div><!--  end card  -->
                </div> <!-- end col-md-12 -->

        </div>
    </div>
</div>