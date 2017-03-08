<div class="content">
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Lista de Usuários <small></small></h4>
                        </div>
                        <div class="content">
                            <div class="toolbar">
                                <!--        Here you can write extra buttons/actions for the toolbar              -->
                            </div>
                            <div class="fresh-datatables">
                                <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th><?php echo lang('index_fname_th');?></th>
                                            <th><?php echo lang('index_lname_th');?></th>
                                            <th><?php echo lang('index_email_th');?></th>
                                            <th><?php echo lang('index_groups_th');?></th>
                                            <th><?php echo lang('index_status_th');?></th>
                                            <th class="disabled-sorting text-right">Ações</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th><?php echo lang('index_fname_th');?></th>
                                            <th><?php echo lang('index_lname_th');?></th>
                                            <th><?php echo lang('index_email_th');?></th>
                                            <th><?php echo lang('index_groups_th');?></th>
                                            <th><?php echo lang('index_status_th');?></th>
                                            <th class="disabled-sorting text-right">Ações</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php foreach ($usuarios as $usuario): ?>
                                        <tr>
                                            <td><?php echo htmlspecialchars($usuario->first_name,ENT_QUOTES,'UTF-8');?></td>
                                            <td><?php echo htmlspecialchars($usuario->last_name,ENT_QUOTES,'UTF-8');?></td>
                                            <td><?php echo htmlspecialchars($usuario->email,ENT_QUOTES,'UTF-8');?></td>
                                            <td>
                                                <?php foreach ($usuario->groups as $group):?>
                                                    <?php echo anchor(admin_url()."usuarios/grupos/editar/".$group->id, htmlspecialchars($group->name,ENT_QUOTES,'UTF-8')) ;?><br />
                                                <?php endforeach?>
                                            </td>
                                            <td><?php echo ($usuario->active) ? anchor(admin_url()."usuarios/desativar/".$usuario->id, lang('index_active_link')) : anchor(admin_url()."usuarios/ativar/". $usuario->id, lang('index_inactive_link'));?></td>
                                            <td class="text-right">
                                                <a href="<?=admin_url()?>usuarios/editar/<?=$usuario->id?>" class="btn btn-simple btn-warning btn-icon edit"><i class="fa fa-edit"></i> Editar</a>
                                                <a href="<?=admin_url()?>usuarios/deletar/<?=$usuario->id?>" class="btn btn-simple btn-danger btn-icon remove confirmar"><i class="fa fa-times"></i> Deletar</a>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div><!-- end content-->
                    </div><!--  end card  -->
                </div> <!-- end col-md-12 -->

        </div>
    </div>
</div>