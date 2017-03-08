<!doctype html>
<html lang="pt-br">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="<?php echo asset_url_admin(); ?>img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Login</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- Bootstrap core CSS     -->
    <link href="<?php echo asset_url_admin(); ?>css/bootstrap.min.css" rel="stylesheet" />
        
    <!--  Light Bootstrap Dashboard core CSS    -->
    <link href="<?php echo asset_url_admin(); ?>css/light-bootstrap-dashboard.css" rel="stylesheet"/>
    
    <!--  CSS for Demo Purpose, don't include it in your project // Removi isso e quebrou algumas coisas   -->
    <link href="<?php echo asset_url_admin(); ?>css/demo.css" rel="stylesheet" />

    <link href="<?php echo asset_url_admin(); ?>css/custom.css" rel="stylesheet" />    
        
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="<?php echo asset_url_admin(); ?>css/pe-icon-7-stroke.css" rel="stylesheet" />

</head>
<body> 

<nav class="navbar navbar-transparent navbar-absolute">
    <div class="container">    
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Edite este cabeçalho! <small>application/views/admin/templates/login.php</small></a>
        </div>
        <div class="collapse navbar-collapse">       
            
            <ul class="nav navbar-nav navbar-right">
                <li>
                   <a href="#">
                        admin@admin.com / password
                    </a>
                </li>
                <li>
                   <a href="http://benedmunds.com/ion_auth/" target="_blank">
                        Ion Auth documentation ->
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>


<div class="wrapper wrapper-full-page">
    <div class="full-page login-page" data-color="orange" data-image="<?php echo asset_url_admin(); ?>img/full-screen-image-1.jpg">   
        
    <!--   you can change the color of the filter page using: data-color="blue | azure | green | orange | red | purple" -->
        <div class="content">
            <div class="container">
                <div class="row">                   
                    <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
                        <form method="POST" action="">
                            
                        <!--   if you want to have the card without animation please remove the ".card-hidden" class   -->
                            <div class="card card-hidden">
                                <div class="header text-center">Login</div>
                                <?php 
                                    $erros = validation_errors();
                                    if ($erros != "") {
                                        echo '<div class="content erros">'.$erros.'</div>';
                                    }
                                ?>
                                <?php
                                    if (isset($_SESSION['message'])) {
                                        echo '<div class="content erros">'.$_SESSION['message'].'</div>';
                                    }
                                ?>
                                <div class="content">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" placeholder="Endereço de email" class="form-control" name="email" autofocus value="<?php echo set_value('email'); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Senha</label>
                                        <input type="password" placeholder="Senha" class="form-control" name="senha">
                                    </div>                                    
                                    <div class="form-group">
                                        <label class="checkbox">
                                            <input type="checkbox" data-toggle="checkbox" name="lembrar">
                                            Continuar Conectado
                                        </label>    
                                    </div>
                                </div>
                                <div class="footer text-center">
                                    <button type="submit" class="btn btn-fill btn-warning btn-wd">Login</button>
                                </div>
                            </div>
                                
                        </form>
                                
                    </div>                    
                </div>
            </div>
        </div>
    	
    	<!--<footer class="footer footer-transparent">
            <div class="container">
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
                    &copy; 2016 <a href="http://www.creative-tim.com">Creative Tim</a>, made with love for a better web
                </p>
            </div>
        </footer>-->

    </div>                             
       
</div>

</body>
    
    <!--   Core JS Files and PerfectScrollbar library inside jquery.ui   -->
    <script src="<?php echo asset_url_admin(); ?>js/jquery-1.10.2.js" type="text/javascript"></script>
    <script src="<?php echo asset_url_admin(); ?>js/jquery-ui.min.js" type="text/javascript"></script>
    <script src="<?php echo asset_url_admin(); ?>js/bootstrap.min.js" type="text/javascript"></script>
	<script src="<?php echo asset_url_admin(); ?>js/bootstrap-checkbox-radio-switch.js" type="text/javascript"></script>

    <!-- Light Bootstrap Dashboard Core javascript and methods -->
    <script src="<?php echo asset_url_admin(); ?>js/light-bootstrap-dashboard.js"></script>
	
	<!-- Light Bootstrap Dashboard DEMO methods, don't include it in your project! -->
	<script src="<?php echo asset_url_admin(); ?>js/demo.js"></script>
	    
    <script type="text/javascript">
        $().ready(function(){
            lbd.checkFullPageBackgroundImage();
            
            setTimeout(function(){
                // after 1000 ms we add the class animated to the login/register card
                $('.card').removeClass('card-hidden');
            }, 700)
        });
    </script>
    
</html>