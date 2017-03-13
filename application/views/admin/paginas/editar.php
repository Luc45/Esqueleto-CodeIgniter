<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Editar Página #<?=$pagina['id']?></h4>
                    </div>
                    <div class="content">
                        <form method="POST">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Título</label>
                                        <input type="text" class="form-control" name="titulo" value="<?=$pagina['titulo']?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>URL</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><?=base_url()?></span>
                                            <input type="text" class="form-control" name="url" value="<?=$pagina['url']?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Menu Ativo</label>
                                        <select name="menu_ativo" class="form-control">
                                            <option value="">- Nenhum -</option>
                                            <?php foreach ($menus as $menu): ?>
                                                <option value="<?=$menu['name']?>" <?=$menu['name']==$pagina['menu_ativo']?' selected ':''?>><?=$menu['name']?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Conteúdo</label>
                                        <textarea class="form-control" name="corpo" rows="30" cols="80" id="ckeditor"><?=$pagina['corpo']?></textarea>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-info btn-fill pull-right">Atualizar Página</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>