<!doctype html>
<html lang="pt-br">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="<?=asset_url_admin()?>img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title><?='CodeIgniter Básico - '.$title?></title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="<?=asset_url_admin()?>css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="<?=asset_url_admin()?>css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="<?=asset_url_admin()?>css/light-bootstrap-dashboard.css" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="<?=asset_url_admin()?>css/demo.css" rel="stylesheet" />

    <link href="<?php echo asset_url_admin(); ?>css/custom.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="<?=asset_url_admin()?>css/pe-icon-7-stroke.css" rel="stylesheet" />

</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="<?=asset_url_admin()?>/img/sidebar-5.jpg">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->
        <?php
            /**
            *   organizar menus e submenus
            *
            *   esse código impede erros de menus não configurados.
            *   para marcar um menu como "active", você deve passar o valor menu_ativo no seu controller
            *   
            *   @example $data['menu_ativo'] = 'usuarios';
            *   @example $data['submenu_ativo'] = 'criar_usuario';
            */
            if (!isset($menu_ativo))
                $menu_ativo = '';
            if (!isset($submenu_ativo))
                $submenu_ativo = '';
        ?>

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="<?=base_url()?>" class="simple-text">
                    CodeIgniter Básico
                </a>
            </div>

            <ul class="nav">

                <li>
                    <a data-toggle="collapse" href="#paginasMenu" class="" aria-expanded="false">
                        <i class="pe-7s-note2"></i>
                        <p>Páginas
                           <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse <?=$menu_ativo=='paginas'?'in':''?>" id="paginasMenu" aria-expanded="false">
                        <ul class="nav">
                            <li <?=$submenu_ativo=='ver_paginas'?'class="active"':''?>><a href="<?=admin_url()?>paginas">Ver Páginas</a></li>
                            <li <?=$submenu_ativo=='criar_pagina'?'class="active"':''?>><a href="<?=admin_url()?>paginas/criar">Criar Página</a></li>
                        </ul>
                    </div>
                </li>

                <li <?=$menu_ativo=='menus'?'class="active"':''?>>
                    <a href="<?=admin_url()?>menus">
                        <i class="pe-7s-way"></i>
                        <p>Menus</p>
                    </a>
                </li>

                <li>
                    <a data-toggle="collapse" href="#usuariosMenu" class="" aria-expanded="false">
                        <i class="pe-7s-user"></i>
                        <p>Usuários
                           <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse <?=$menu_ativo=='usuarios'?'in':''?>" id="usuariosMenu" aria-expanded="false">
                        <ul class="nav">
                            <li <?=$submenu_ativo=='ver_usuario'?'class="active"':''?>><a href="<?=admin_url()?>usuarios">Ver usuários</a></li>
                            <li <?=$submenu_ativo=='criar_usuario'?'class="active"':''?>><a href="<?=admin_url()?>usuarios/criar">Criar Usuário</a></li>
                            <li <?=$submenu_ativo=='criar_grupo'?'class="active"':''?>><a href="<?=admin_url()?>usuarios/grupos/criar">Criar Grupo</a></li>
                        </ul>
                    </div>
                </li>

            </ul>
    	</div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Exibir/Esconder Menu</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"><?=$title?></a>
                </div>
                <div class="collapse navbar-collapse">

                    <!-- Formulário de Pesquisa
                    <form class="navbar-form navbar-left navbar-search-form" role="search">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-search"></i></span>
                            <input type="text" value="" class="form-control" placeholder="Pesquisar...">
                        </div>
                    </form>
                    -->

                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    Olá, <?=$this->ion_auth->user()->row()->first_name?>!
                                    <b class="caret"></b>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="<?=admin_url()?>perfil/editar">Editar Perfil</a></li>
                              </ul>
                        </li>
                        <li>
                            <a href="<?=base_url()?>logout">
                                <i class="fa fa-sign-out" aria-hidden="true"></i> Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <?php echo $body ?>


         <footer class="footer">
                    <div class="container-fluid">
                        <nav class="pull-left">
                            <ul>
                                <li>
                                    <a href="<?=base_url();?>">
                                        Home
                                    </a>
                                </li>
                            </ul>
                        </nav>
                        <p class="copyright pull-right">
                            &copy; 2017 <a href="http://www.lucasbustamante.com.br">Lucas Bustamante</a>, desenvolvedor.
                        </p>
                    </div>
                </footer>

            </div>
        </div>


        </body>

            <!--   Core JS Files   -->
            <script src="<?=asset_url_admin()?>js/jquery-1.10.2.js" type="text/javascript"></script>
            <script src="<?=asset_url_admin()?>js/jquery-ui.min.js" type="text/javascript"></script>
            <script src="<?=asset_url_admin()?>js/bootstrap.min.js" type="text/javascript"></script>

            <!--  Checkbox, Radio & Switch Plugins -->
            <script src="<?=asset_url_admin()?>js/bootstrap-checkbox-radio-switch.js"></script>

            <!--  Charts Plugin -->
            <script src="<?=asset_url_admin()?>js/chartist.min.js"></script>

            <!--  Notifications Plugin    -->
            <script src="<?=asset_url_admin()?>js/bootstrap-notify.js"></script>

            <script src="<?=asset_url_admin()?>js/jquery.datatables.js"></script>

            <!--<script src="<?=asset_url_admin()?>js/jquery-ui.min.js.js"></script>-->

            <!--  Google Maps Plugin    -->
            <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>

            <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
            <script src="<?=asset_url_admin()?>js/light-bootstrap-dashboard.js"></script>

            <!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
            <script src="<?=asset_url_admin()?>js/demo.js"></script>

            <!--
                Javascripts adicionais definidos no controller
                Uso: $data['scripts_adicionais'] = array('meuscript.js');
            -->
            <?php if (!empty($scripts_adicionais)):
                foreach ($scripts_adicionais as $script_adicional): ?>
                    <script src="<?php echo asset_url()?>admin/js/<?=$script_adicional?>"></script>
            <?php endforeach; endif; ?>

            <!-- Para que possamos pegar a URL do projeto com jQuery -->
            <input type="hidden" id="admin_url" value="<?=admin_url()?>">

            <script src="<?=asset_url_admin()?>js/custom.js"></script>

            <!-- Habilita as notificações -->
            <script type="text/javascript">
                <?php if (isset($_SESSION['message'])): ?>
                    $.notify({
                        icon: 'pe-7s-bell',
                        message: '<?=trim(strip_tags($_SESSION['message']))?>',
                    },{
                        type: 'info',
                        timer: 3000
                    });
                <?php endif; ?>
                <?php if (isset($_SESSION['success'])): ?>
                    $.notify({
                        icon: 'pe-7s-bell',
                        message: '<?=trim(strip_tags($_SESSION['success']))?>',
                    },{
                        type: 'success',
                        timer: 3000
                    });
                <?php endif; ?>
                <?php if (isset($_SESSION['error'])): ?>
                    $.notify({
                        icon: 'pe-7s-bell',
                        message: '<?=trim(strip_tags($_SESSION['error']))?>',
                    },{
                        type: 'danger',
                        timer: 3000
                    });
                <?php endif; ?>
            </script>

            <?php if ($menu_ativo == 'dashboard'): ?>
                <script type="text/javascript">
                    $(document).ready(function(){
                        demo.initChartist();
                    });
                </script>
            <?php endif; ?>

            <?php if ($menu_ativo == 'maps'): ?>
                <script>
                    $().ready(function(){
                        demo.initGoogleMaps();
                    });
                </script>
            <?php endif; ?>

        </html>
