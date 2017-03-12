/**
* Disponibiliza a URL do painel de administração, através de um input hidden localizado no template default.php
*/
var root_dir = $('#admin_url').val();

$(document).ready(function() {
	$('#datatables').DataTable({
	    "pagingType": "full_numbers",
	    "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
	    responsive: true,
	    language: {
		    "sEmptyTable": "Nenhum registro encontrado",
		    "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
		    "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
		    "sInfoFiltered": "(Filtrados de _MAX_ registros)",
		    "sInfoPostFix": "",
		    "sInfoThousands": ".",
		    "sLengthMenu": "_MENU_ resultados por página",
		    "sLoadingRecords": "Carregando...",
		    "sProcessing": "Processando...",
		    "sZeroRecords": "Nenhum registro encontrado",
		    "sSearch": "Pesquisar",
		    "oPaginate": {
		        "sNext": "Próximo",
		        "sPrevious": "Anterior",
		        "sFirst": "Primeiro",
		        "sLast": "Último"
		    },
		    "oAria": {
		        "sSortAscending": ": Ordenar colunas de forma ascendente",
		        "sSortDescending": ": Ordenar colunas de forma descendente"
		    }
		},
        /* Disable initial sort */
        "aaSorting": []

	});


	var table = $('#datatables').DataTable();

});

$('a.confirmar').on('click', function(e) {
	if (confirm('Deseja fazer isso?') == false) {
		e.preventDefault();
	}
});

/**
*	Função para habilitar a função sort em tabelas bootstrap com AJAX
*	
*	No HTML:
*	Adicionar <tbody class="sortable">
*	Adicionar <tr id="id_<?=$item['id']?>">
*	Adicionar em algum lugar da página um <input type="hidden" id="sort_function" value="XXXXX"> onde XXXXX é a function do Controller admin/Ajax.php
*
*/
if (typeof $.fn.sortable === 'function') {
    $('.sortable').each(function() {
    	var sort_function = $('#sort_function').val();
    	// Adicione um <input type="hidden" id="extra_data" value="<?php echo $var?>"> para passar informações extras
    	if(document.getElementById("extra_data") !== null) {
    		var extra_data = '&extra_data='+$('#extra_data').val();
    	} else {
    		var extra_data = '';
    	}
    	if (typeof(sort_function !== "undefined") && typeof(root_dir !== "undefined")) {
	        $(this).sortable({
	            axis: 'y',
	            update: function (event, ui) {
	                var data = $(this).sortable('serialize')+extra_data;
	 
	                // POST to server using $.post or $.ajax
	                $.ajax({
	                    data: data,
	                    type: 'POST',
	                    url: root_dir+'ajax/'+sort_function,
	                });
	            }
	        });
   		}
    });
}

/**
*	Converte um texto em slug
*/
function slugify(e) {
	if (typeof e == "string") {
		// Passa uma string. Exemplo: slugify('este texto');

		// remove accents, swap ñ for n, etc
 		var from = "àáäâèéëêìíïîòóöôùúüûñç·/_,:;";
  		var to   = "aaaaeeeeiiiioooouuuunc------";
		  for (var i=0, l=from.length ; i<l ; i++)
		    e = e.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));

		s = e.toString().toLowerCase()
					.replace(/\s+/g, '-')           // Replace spaces with -
					.replace(/[^\w\-]+/g, '')       // Remove all non-word chars
					.replace(/\-\-+/g, '-')         // Replace multiple - with single -
					.replace(/^-+/, '')             // Trim - from start of text
					.replace(/-+$/, '');
		return s;
	} else {
		// Passa um objeto. Exemplo: onkeyup="slugify(this)";

		var Text = $(e).val();
		
		// remove accents, swap ñ for n, etc
 		var from = "àáäâèéëêìíïîòóöôùúüûñç·/_,:;";
  		var to   = "aaaaeeeeiiiioooouuuunc------";
		  for (var i=0, l=from.length ; i<l ; i++)
		    Text = Text.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));

		Text = Text.toString().toLowerCase()
					.replace(/\s+/g, '-')           // Replace spaces with -
					.replace(/[^\w\-]+/g, '')       // Remove all non-word chars
					.replace(/\-\-+/g, '-')         // Replace multiple - with single -
					.replace(/^-+/, '')             // Trim - from start of text
					.replace(/-+$/, '');
		$(e).val(Text);
	}
}

$('#criar_slug').on('blur', function() {
	var Text = $(this).val();
	Text = slugify(Text);
	$("#slug").val(Text);
})

$("#pagina_inicial_menu").on('click', function() {
	if ($(this).is(':checked')) {
		$("#slug").val('');
	}
})

/**
*	Adiciona um submenu
*	usado em admin/menus/editar/$id
*/
function adicionarSubmenu() {
	var submenu = $('#adicionar_submenu').val();
	var parent_id = $('#parent_id').val();
	$.ajax({
		url:root_dir+'ajax/adicionar_submenu',
		type:'POST',
		data:{submenu:submenu, parent_id:parent_id},
		success:function(json) {
			window.location.reload(true);
			/*var novo_menu = '\
			<tr id="id_'+json.id+'" class="ui-sortable-handle even" role="row">\
                <td tabindex="0">'+json.id+'</td>\
                <td>'+json.name+'</td>\
                <td>'+json.slug+'</td>\
                <td class="text-right">\
                    <a href="'+root_dir+'menus/editar/'+json.id+'" class="btn btn-simple btn-warning btn-icon edit"><i class="fa fa-edit"></i> Editar</a>\
                    <a href="'+root_dir+'menus/deletar/'+json.id+'" class="btn btn-simple btn-danger btn-icon remove confirmar"><i class="fa fa-times"></i> Deletar</a>\
                </td>\
            </tr>';
			$("#datatables tbody").append(novo_menu);*/
		}
	});
}

/**
*	Adiciona um menu
*	usado em admin/menus
*/
function adicionarMenu() {
	var menu = $('#adicionar_menu').val();
	$.ajax({
		url:root_dir+'ajax/adicionar_menu',
		type:'POST',
		data:{menu:menu},
		success:function(json) {
			window.location.reload(true);
		}
	});
}

/**
*	Habilita o CKEditor
*/
if (typeof CKEDITOR === 'object') {
	$(document).ready(function() {
		// <textarea id="ckeditor"></textarea>
		CKEDITOR.replace( 'ckeditor' );
	});
}