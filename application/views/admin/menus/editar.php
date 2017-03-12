<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Editar Menu <?=$menu['name']?></h4>
                    </div>
                    <div class="content">
                        <form method="POST">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Título</label>
                                        <input type="text" class="form-control" name="name" value="<?=$menu['name']?>" id="criar_slug">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Slug</label>
                                        <div class="input-group">
                                          <span class="input-group-addon"><?=base_url()?></span>
                                          <input type="text" class="form-control" name="url" value="<?=$menu['url']?>" onblur="slugify(this)" id="slug">
                                          <?php if ($menu['parent_id'] == ''): ?>
                                              <span class="input-group-addon">
                                                <input type="checkbox" id="pagina_inicial_menu">
                                                Pagina Inicial?
                                              </span>
                                         <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php if ($menu['parent_id'] == ''): ?>
                                <div class="row">
                                    <div class="col-md-12">
                                    <input type="hidden" id="parent_id" value="<?=$menu['id']?>">
                                    <hr>
                                    <h4>Lista de Submenus <small>Arraste e solte para alterar a ordem.</small></h4>  
                                    <h4>Criar Submenu <small><input type="text" class="form-control" id="adicionar_submenu"> <a href="javascript:;" onclick="adicionarSubmenu()" class="btn btn-default">Adicionar Submenu</a></small></h4>                     
                                        <?php if (isset($menu['childs'])): ?>
                                            <input type="hidden" id="extra_data" value="<?=$menu['id']?>">
                                            <div class="fresh-datatables">
                                                <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th data-orderable="false">Nome</th>
                                                            <th data-orderable="false">Url</th>
                                                            <th class="disabled-sorting text-right">Ações</th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>
                                                            <th data-orderable="false">Nome</th>
                                                            <th data-orderable="false">Url</th>
                                                            <th class="disabled-sorting text-right">Ações</th>
                                                        </tr>
                                                    </tfoot>
                                                    <tbody class="sortable">

                                                        <?php foreach ($menu['childs'] as $submenu):?>
                                                            <tr id="id_<?=$submenu['id']?>">
                                                                <td><?=$submenu['name']?></td>
                                                                <td><?=$submenu['url']?></td>
                                                                <td class="text-right">
                                                                    <a href="<?=admin_url()?>menus/editar/<?=$submenu['id']?>" class="btn btn-simple btn-warning btn-icon edit"><i class="fa fa-edit"></i> Editar</a>
                                                                    <a href="<?=admin_url()?>menus/deletar/<?=$submenu['id']?>" class="btn btn-simple btn-danger btn-icon remove confirmar"><i class="fa fa-times"></i> Deletar</a>
                                                                </td>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <button type="submit" class="btn btn-info btn-fill pull-right">Atualizar Menu</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Custom.js pega a função de AJAX a rodar por aqui -->
<input type="hidden" id="sort_function" value="sort_submenus">