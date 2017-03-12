<div class="content">
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4>Criar Menu <small><input type="text" class="form-control" id="adicionar_menu"> <a href="javascript:;" onclick="adicionarMenu()" class="btn btn-default">Adicionar Menu</a></small></h4>
                            <hr>
                            <h4 class="title">Lista de Menus <small>Arraste e solte para alterar a ordem dos menus.</small></h4>
                        </div>
                        <div class="content">
                            <div class="toolbar">
                                <!--        Here you can write extra buttons/actions for the toolbar              -->
                            </div>
                            <div class="fresh-datatables">
                                <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th data-orderable="false">Ordem</th>
                                            <th data-orderable="false">Nome</th>
                                            <th data-orderable="false">Url</th>
                                            <th data-orderable="false">Submenus</th>
                                            <th class="disabled-sorting text-right">Ações</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th data-orderable="false">Ordem</th>
                                            <th data-orderable="false">Nome</th>
                                            <th data-orderable="false">Url</th>
                                            <th data-orderable="false">Submenus</th>
                                            <th class="disabled-sorting text-right">Ações</th>
                                        </tr>
                                    </tfoot>
                                    <tbody class="sortable">
                                        <?php foreach ($menus as $menu): ?>
                                            <?php if ($menu['parent_id'] == ''): ?>
                                                <tr id="id_<?=$menu['id']?>">
                                                    <td><?=$menu['ordem']?></td>
                                                    <td><?=$menu['name']?></td>
                                                    <td><?=$menu['url']?></td>
                                                    <td class="submenus_admin">
                                                        <?php if (isset($menu['childs'])): ?>
                                                            <ul>
                                                                <?php foreach ($menu['childs'] as $submenu):?>
                                                                        <li><?=$submenu['name']?></li>
                                                                <?php endforeach; ?>
                                                            </ul>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td class="text-right">
                                                        <a href="<?=admin_url()?>menus/editar/<?=$menu['id']?>" class="btn btn-simple btn-warning btn-icon edit"><i class="fa fa-edit"></i> Editar</a>
                                                        <a href="<?=admin_url()?>menus/deletar/<?=$menu['id']?>" class="btn btn-simple btn-danger btn-icon remove confirmar"><i class="fa fa-times"></i> Deletar</a>
                                                    </td>
                                                </tr>
                                            <?php endif; ?>
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
<!-- Custom.js pega a função de AJAX a rodar por aqui -->
<input type="hidden" id="sort_function" value="sort_menus">