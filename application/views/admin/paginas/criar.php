<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Criar Página</h4>
                    </div>
                    <div class="content">
                        <form method="POST">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Título</label>
                                        <input type="text" class="form-control" name="titulo" id="criar_slug">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>URL</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><?=base_url()?></span>
                                            <input type="text" class="form-control" name="url" id="slug">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Menu Ativo</label>
                                        <select name="menu_ativo" class="form-control">
                                            <?php foreach ($menus as $menu): ?>
                                                <option value="">- Nenhum -</option>
                                                <option value="<?=$menu['name']?>"><?=$menu['name']?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Conteúdo</label>
                                        <textarea class="form-control" name="corpo" rows="30" cols="80" id="ckeditor"></textarea>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-info btn-fill pull-right">Criar Página</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>