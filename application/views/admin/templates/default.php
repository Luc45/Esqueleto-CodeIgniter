<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="<?=asset_url_admin()?>img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>CodeIgniter Básico - <?=$title?></title>

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
    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="<?=admin_url()?>" class="simple-text">
                    CodeIgniter Básico
                </a>
            </div>

            <ul class="nav">
                <li <?=$menu_ativo=='dashboard'?'class="active"':''?>>
                    <a href="<?=admin_url()?>">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li <?=$menu_ativo=='paginas'?'class="active"':''?>>
                    <a href="<?=admin_url()?>paginas">
                        <i class="pe-7s-user"></i>
                        <p>Páginas</p>
                    </a>
                </li>
                <li <?=$menu_ativo=='user'?'class="active"':''?>>
                    <a href="<?=admin_url()?>user">
                        <i class="pe-7s-user"></i>
                        <p>User Profile</p>
                    </a>
                </li>
                <li <?=$menu_ativo=='table'?'class="active"':''?>>
                    <a href="<?=admin_url()?>table">
                        <i class="pe-7s-note2"></i>
                        <p>Table List</p>
                    </a>
                </li>
                <li <?=$menu_ativo=='typography'?'class="active"':''?>>
                    <a href="<?=admin_url()?>typography">
                        <i class="pe-7s-news-paper"></i>
                        <p>Typography</p>
                    </a>
                </li>
                <li <?=$menu_ativo=='icons'?'class="active"':''?>>
                    <a href="<?=admin_url()?>icons">
                        <i class="pe-7s-science"></i>
                        <p>Icons</p>
                    </a>
                </li>
                <li <?=$menu_ativo=='maps'?'class="active"':''?>>
                    <a href="<?=admin_url()?>maps">
                        <i class="pe-7s-map-marker"></i>
                        <p>Maps</p>
                    </a>
                </li>
                <li <?=$menu_ativo=='notifications'?'class="active"':''?>>
                    <a href="<?=admin_url()?>notifications">
                        <i class="pe-7s-bell"></i>
                        <p>Notifications</p>
                    </a>
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
                                    Olá, <?=$user->first_name?>!
                                    <b class="caret"></b>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="<?=admin_url()?>perfil/editar/<?=$user->id?>">Editar Perfil</a></li>
                              </ul>
                        </li>
                        <li>
                            <a href="<?=admin_url()?>logout">
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
                                    <a href="#">
                                        Home
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        Company
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        Portfolio
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                       Blog
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
            <script src="<?=asset_url_admin()?>/js/jquery-1.10.2.js" type="text/javascript"></script>
            <script src="<?=asset_url_admin()?>/js/jquery-ui.min.js" type="text/javascript"></script>
            <script src="<?=asset_url_admin()?>/js/bootstrap.min.js" type="text/javascript"></script>

            <!--  Checkbox, Radio & Switch Plugins -->
            <script src="<?=asset_url_admin()?>/js/bootstrap-checkbox-radio-switch.js"></script>

            <!--  Charts Plugin -->
            <script src="<?=asset_url_admin()?>/js/chartist.min.js"></script>

            <!--  Notifications Plugin    -->
            <script src="<?=asset_url_admin()?>/js/bootstrap-notify.js"></script>

            <script src="<?=asset_url_admin()?>/js/jquery.datatables.js"></script>

            <!--  Google Maps Plugin    -->
            <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>

            <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
            <script src="<?=asset_url_admin()?>/js/light-bootstrap-dashboard.js"></script>

            <!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
            <script src="<?=asset_url_admin()?>/js/demo.js"></script>

            <script src="<?=asset_url_admin()?>/js/custom.js"></script>

            <?php if ($menu_ativo == 'dashboard'): ?>
                <script type="text/javascript">
                    $(document).ready(function(){

                        demo.initChartist();

                        /*$.notify({
                            icon: 'pe-7s-gift',
                            message: "Welcome to <b>Light Bootstrap Dashboard</b> - a beautiful freebie for every web developer."

                        },{
                            type: 'info',
                            timer: 4000
                        });*/

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
