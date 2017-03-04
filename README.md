Este é um esqueleto em CodeIgniter para projetos PHP.

É um CodeIgniter 3 com a pasta System original, porém com algumas modificações na pasta applications para permitir:

 - Pasta "assets" na raiz, para colocar arquivos CSS, JS e imagens
 - Sistema básico de template, para carregar o header, footer e view em uma linha de código no Controller
 - Possibilidade de setar a site url de acordo com um valor da database, ao invés de ficar hardcoded no config.php

 Boa organização de views, separando admin e frontend, e dentro de cada uma separando por tipo.

 	Exemplo:
 		- admin
 			- pages
 				- dashboard.php
 				- icons.php
 				- maps.php
 				- notifications.php
 				- table.php
 				- typography.php
 				- users.php
 			- templates
 				- default.php
 		- frontend
 			- pages
 				- home.php
 				- sobre.php
 			- templates
 				- default.php

 Frontend
 	Bootstrap 3
 	Font Awesome
 	jQuery
 	custom.css e custom.js sem nada, praticamente

 Admin
 	Implementação do Light Bootstrap Dashboard no CodeIgniter (https://www.creative-tim.com/product/light-bootstrap-dashboard)
 	Adaptado para uso do sistema básico de template acima, então é só criar a view na pasta pages/minhanovaview.php e adicionar o link no menu em templates/default.php

---

Arquivos novos/modificados da pasta Applications:
	Libraries:
		Template.php (novo) -> As funções do sistema básico de template são carregadas aqui.

	Helpers
		utility_helper.php (novo) -> Adicina as funções asset_url(), asset_url_admin() e admin_url()

	Language
		Adicionada tradução portuguese-br do CodeIgniter

	Core
		MY_Controller.php (novo) -> Extende o CI_Controller, permitindo pegar informações da database e usar diretamente nos Controllers, como o site_url por exemplo (estilo Wordpress). Para usar essa funcionalidade seu Controller deve extender MY_Controller, não CI_Controller.

	Config
		routes.php (modificado) -> Adicionado rotas para assets, admin e pages
		autoload.php (modificado) -> Configurado para carregar automáticamente as libraries 'database' e 'template', e os helpers 'url' e 'utility' (mencionado acima).
		config.php (modificado) -> Alterado language para 'portuguese-br' e enable_hooks para TRUE.