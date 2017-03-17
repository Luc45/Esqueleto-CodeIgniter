<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title ?></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link href="<?php echo asset_url()?>css/style.css" rel="stylesheet"/>
	<meta charset="UTF-8">
</head>
<body>
		<header>
			<nav class="navbar navbar-default navbar-fixed-top">
				<div class="container">
					<div class="navbar-header">
						<a class="navbar-brand" href="<?php echo base_url()?>">CodeIgniter Básico</a>
					</div>
					<div class="nav navbar-right navbar-nav">
						<ul class="nav navbar-nav">
							<?php foreach ($menus as $menu): ?>
								<li class="<?php echo isset($menu_ativo) && strtolower($menu_ativo)==strtolower($menu['url']) || strtolower($menu_ativo)==strtolower($menu['name'])?' active ':''?>">
									<?php if (empty($menu['childs'])): ?>
										<a href="<?php echo site_url().$menu['url']?>"><?=$menu['name']?></a>
									<?php else: ?>
										<a href="<?php echo site_url().$menu['url']?>" class="dropdown-toggle" data-toggle="dropdown" role="button"><?=$menu['name']?> <span class="caret"></span></a>
									<?php endif; ?>
									<ul class="dropdown-menu">
									<?php if(isset($menu['childs'])) {foreach ($menu['childs'] as $child): ?>
											<li><a href="<?=$child['url']?>"><?=$child['name']?></a></li>
									<?php endforeach;} ?>
									</ul>
								</li>
							<?php endforeach; ?>
							<!--
								MENU ESTÁTICO
								Só adicionar o < nos ?php
							<li class="?php echo $menu_ativo=='home'?'active':''?>"><a href="?php echo site_url(); ?>">Home</a></li>
							<li class="?php echo $menu_ativo=='sobre'?'active':''?>">
								<a href="?php echo site_url(); ?>" class="dropdown-toggle" data-toggle="dropdown" role="button">Sobre <span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="?php echo site_url(); ?>exemplo">Exemplo 1</a></li>
									<li><a href="?php echo site_url(); ?>exemplo">Exemplo 2</a></li>
									<li><a href="?php echo site_url(); ?>exemplo">Exemplo 3</a></li>
								</ul>
							</li>
							<li class="?php echo $menu_ativo=="contato"?'active':''?>"><a href="?php echo site_url(); ?>contato">Contato</a></li>-->
						</ul>
					</div>
				</div>
			</nav>
		</header>
		<main class="container">
			<?php echo $body ?>
		</main>

		<footer class="container">
			
		</footer>
		<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		<?php if (!empty($scripts_adicionais)):
			foreach ($scripts_adicionais as $script_adicional): ?>
				<script src="<?php echo asset_url()?>js/'.$script_adicional?>"></script>
		<?php endforeach; endif; ?>
		<script src="<?php echo asset_url()?>js/custom.js"></script>
	</body>
</html> 
