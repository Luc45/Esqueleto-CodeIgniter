<div class="content">
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title"><?php echo lang('edit_group_heading');?> <small><?php echo lang('edit_group_subheading');?></small></h4>
                        </div>
                        <div class="content">

                        <form method="POST">
                            <div class="form-group">
                                <?php echo lang('edit_group_name_label', 'group_name');?>
                                <?php echo form_input($group_name);?>
                            </div>
                            <div class="form-group">
                                <?php echo lang('edit_group_desc_label', 'description');?>
                                <?php echo form_input($group_description);?>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Editar Grupo">
                                <a class="btn btn-danger confirmar" href="<?=admin_url().'usuarios/grupos/deletar/'.$group->id?>">Excluir Grupo</a>
                            </div>
                        </form>

                        </div><!-- end content-->
                    </div><!--  end card  -->
                </div> <!-- end col-md-12 -->

        </div>
    </div>
</div>