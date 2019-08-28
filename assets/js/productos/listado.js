
$('body').on('click', '#btn-filtrar-sc', function(){

	idSku = $(this).data('sku');
	idSubcategoria = $('#selectSubCategorias option:selected').val();


	$.post(WMS.base_url+'Productos/getListado', {idSubcategoria:idSubcategoria, idSku: idSku}, function(data){

		var obj = JSON.parse(data);

		lista = '';
		cls = "'.rrss'";

		if(obj.length > 0){
			lista += '<div class="col-lg-12 rrss">';
			lista += '<button class="btn btn-default btn-xs pull-right" onclick="copy('+cls+')"><i class="fas fa-copy"></i></button>';
			lista += '<br />';
			$(obj).each(function(index, value){				
				lista += '<span>📍 '+value.nombreMarca+' '+value.nombreProducto+' $'+ new Intl.NumberFormat("de-DE").format(Math.trunc(value.valorVenta)) +' ('+value.undPack+' UND) '+'</span><br />';						
			});
			lista += '</div>';
		}else{

			lista = '<p>No hay resultados.. Int&eacute;ntalo de nuevo =)</p>';
		}		

		$('#listado').html(lista);

	});

});


$('body').on('click', '#btn-filtrar-m', function(){

	idSku = $(this).data('sku');
	idMarca = $('#selectMarca option:selected').val();


	$.post(WMS.base_url+'Productos/getListado', {idMarca:idMarca, idSku: idSku}, function(data){

		var obj = JSON.parse(data);

		lista = '';
		cls = "'.rrss'";

		if(obj.length > 0){

			lista += '<div class="col-lg-12 rrss">';
			lista += '<button class="btn btn-default btn-xs pull-right" onclick="copy('+cls+')"><i class="fas fa-copy"></i></button>';
			$(obj).each(function(index, value){
				lista += '<span>📍 '+value.nombreMarca+' '+value.nombreProducto+' $'+ new Intl.NumberFormat("de-DE").format(Math.trunc(value.valorVenta)) +' ('+value.undPack+' UND)'+'</span>';			
				lista += '<br />';
			});
			lista += '</div>';

		}else{

			lista = '<p>No hay resultados.. Int&eacute;ntalo de nuevo =) </p>';
		}

		$('#listado').html(lista);

	});

});

/* SELECTPICKER, CATEGORIAS */
$('body').on('change', '#selectCategorias', function(){

	idCategoria = $(this).val();

	$.post(WMS.base_url+'Productos/subcategoriasxcategoria', {idCategoria:idCategoria}, function(data){

		var obj = JSON.parse(data);
		
		lista = '';
		lista += '<option value="0">Seleccione una Opci&oacute;n</option>';

		$(obj).each(function(index, value){
			lista += '<option value='+value.idsubcategoria+'>'+value.nombre+'</option>';
		});

		$('#selectSubCategorias').html(lista).selectpicker('refresh');


	});

});

// COPY CLIPBOARD KEEPING THE TEXT FORMAT
function copy(selector){
  var $temp = $("<div>");
  $("body").append($temp);
  $temp.attr("contenteditable", true)
       .html($(selector).html()).select()
       .on("focus", function() { document.execCommand('selectAll',false,null) })
       .focus();
  document.execCommand("copy");
  $temp.remove();
}
