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
		}

	});


	var table = $('#datatables').DataTable();

});

/**
*	Adicione a classe 'confirmar' onde você queira que apareça uma confirmação "Deseja fazer isso?"
*/
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
*	O #admin_url já está adicionado no template default.php no painel de administração
*/
if (typeof $.fn.sortable === 'function') {
    $('.sortable').each(function() {
    	var sort_function = $('#sort_function').val();
    	var root_dir = $('#admin_url').val();
    	console.log(sort_function);
    	console.log(root_dir);
    	if (typeof(sort_function !== "undefined") && typeof(root_dir !== "undefined")) {
	        $(this).sortable({
	            axis: 'y',
	            update: function (event, ui) {
	                var data = $(this).sortable('serialize');
	 
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