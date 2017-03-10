<!doctype html>
<html lang="pt-br">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="<?php echo asset_url_admin(); ?>img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title><?=$title?></title>
 
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="<?php echo asset_url_admin(); ?>css/bootstrap.min.css" rel="stylesheet" />
        
    <!--  Light Bootstrap Dashboard core CSS    -->
    <link href="<?php echo asset_url_admin(); ?>css/light-bootstrap-dashboard.css" rel="stylesheet"/>
    
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="<?php echo asset_url_admin(); ?>css/demo.css" rel="stylesheet" />

    <link href="<?php echo asset_url_admin(); ?>css/custom.css" rel="stylesheet" />    
        
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="<?php echo asset_url_admin(); ?>css/pe-icon-7-stroke.css" rel="stylesheet" />

</head>
<body> 

    <?php echo $body ?>

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