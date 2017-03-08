<div class="content">
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Lista de Páginas</h4>
                        </div>
                        <div class="content">
                            <div class="toolbar">
                                <!--        Here you can write extra buttons/actions for the toolbar              -->
                            </div>
                            <div class="fresh-datatables">
                                <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Título</th>
                                            <th>URL</th>
                                            <th>Corpo</th>
                                            <th class="disabled-sorting text-right">Ações</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Título</th>
                                            <th>URL</th>
                                            <th>Corpo</th>
                                            <th class="disabled-sorting text-right">Ações</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php foreach ($paginas as $pagina): ?>
                                        <tr>
                                            <td><?=$pagina['id']?></td>
                                            <td><?=$pagina['titulo']?></td>
                                            <td><?=$pagina['url']?></td>
                                            <td><?=getExcerpt($pagina['corpo'])?></td>
                                            <td class="text-right">
                                                <a href="<?=admin_url()?>paginas/editar/<?=$pagina['id']?>" class="btn btn-simple btn-warning btn-icon edit"><i class="fa fa-edit"></i> Editar</a>
                                                <a href="<?=admin_url()?>paginas/deletar/<?=$pagina['id']?>" class="btn btn-simple btn-danger btn-icon remove confirmar"><i class="fa fa-times"></i> Deletar</a>
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