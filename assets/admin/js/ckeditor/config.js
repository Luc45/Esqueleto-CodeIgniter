/**
* Disponibiliza a URL do painel de administração, através de um input hidden localizado no template default.php
*/
var root_dir = $('#admin_url').val();

/**
 * @license Copyright (c) 2003-2017, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';

	config.extraPlugins = 'widget,filetools,lineutils,notificationaggregator,widgetselection,notification,uploadwidget,uploadimage';
	config.imageUploadUrl = root_dir+'/ajax/upload_image';

	config.height = 300;        // 600 pixels high.

};
