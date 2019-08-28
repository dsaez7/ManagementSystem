$(document).ready(function(){

	ViewDataTable();
	primeraOpcionCategorias();

});

function ViewDataTable(){

	$('#tblProductos').DataTable().destroy();
	
	tbl = $('#tblProductos').DataTable({

	    'lengthMenu': [[5, 10, 15, -1], [5, 10, 15, "Todo"]],
	    'paging': true,
	    'ordering': true,
	    'info': true,
	    'filter': true,
	    'stateSave': false,
	    'searching': true,

	    'processing':true,
	    'serverSide':true,

	    "language": {    
	        "url" : "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
	    },

	    'ajax':{
	        'url': WMS.base_url+'Productos/getProductosServerSide',
	        'type': 'POST',
	    },

	    'columns': [
	        {data: 'nombreCategoria'},
	        {data: 'nombreSub'},
	        {data: 'nombreMarca'},
	        {data: 'nombreProducto'},        
	        {data: 'valorBruto'},
	        {data: 'valorVenta'},
	        {data: 'oferta'},
	        {data: 'stock'},
	        {'orderable': true,
	            render: function(data, type, row){
	            	btn = '<button class="btn btn-primary btn-circle btn-edit" data-idproducto="'+row.idproducto+'">';
	                btn += '<i class="fas fa-edit " style="color: #fff; font-size: 14px; cursor: pointer; white-space: nowrap;"></i>';
	                btn += '</button>';
	                return btn;
	            }

	        },

	    ],

	});
}

function primeraOpcionCategorias(){

	$('#selectCategorias').val($('#selectCategorias option:first').val());
	$('#selectMarca').val($('#selectMarca option:first').val());

}


/* MODAL, AGREGAR NUEVO PRODUCTO */
$('body').on('click', '.btn-addnuevoprod', function(){

	$('#wmsaddproducto-modal').modal();

});

/* SELECTPICKER, CATEGORIAS (EN MODAL) */
$('body').on('change', '#selectCategorias', function(){

	idCategoria = $(this).val();

	$.post(WMS.base_url+'Productos/subcategoriasxcategoria', {idCategoria:idCategoria}, function(data){

		var obj = JSON.parse(data);
		
		lista = '';
		lista += '<option value="0">Seleccione una Opci&oacute;n</option>';

		$(obj).each(function(index, value){
			lista += '<option value='+value.idsubcategoria+'>'+value.nombre+'</option>'
		});

		$('#selectSubCategorias').html(lista).selectpicker('refresh');


	});

});

/* BTN-ADD MODAL ACCION DEFINITIVA */
$('#btn-new-prod').click(function(){

	nomprod = $('#nameProducto').val();
	marca = $('#selectMarca option:selected').val();
	subcategoria = $('#selectSubCategorias option:selected').val();
	undPack = $('#undPack').val();
	stock = $('#stock').val();
	valorBruto = $('#valorBruto').val();
	valorVenta = $('#valorVenta').val();

	params = [nomprod, marca, subcategoria, undPack, stock, valorBruto, valorVenta];

	$.post(WMS.base_url+'Productos/addProducto', {params:params}, function(data){

		var obj = JSON.parse(data);

		if(obj == 'ok'){

			$('#wmsaddproducto-modal').modal('toggle');	
			$('#tblProductos').DataTable().ajax.reload(null, false);

			// Enviar un mensaje en pantalla (Tipo alert)
			$("body").messagefy({
				color: "btn-success",
				title: "Registro guardado exitosamente!",
				titleIcon: "ok",
				msg: "<span>Se ha insertado el registro <strong>"+nomprod+"</strong>.</span>"
			});

		}else{

			$('#wmsaddproducto-modal').modal('toggle');	
			
			// Enviar un mensaje en pantalla (Tipo alert)
			$("body").messagefy({
				color: "btn-danger",
				title: "Error!",
				titleIcon: "remove",
				msg: "<span>Ha ocurrido un error.</span>"
			});

		}

	});

});



/* BTN-ADD CARRITO */
$('body').on('click', '.btn-add', function(){

	idproducto = $(this).data('idproducto');

	$.post(WMS.base_url+'Carrito/agregar', {idproducto:idproducto}, function(data){
		
		var obj = JSON.parse(data);

	});

});

/* BTN-EDIT TBL */
$('body').on('click', '.btn-edit', function(){

	idproducto = $(this).data('idproducto');
	$('#idproducto-val').val(idproducto);

	$.post(WMS.base_url+'Productos/editProducto', {idproducto:idproducto}, function(data){

		var obj = JSON.parse(data);

		$('#nameProducto-edit').val(obj[0].nombreprod);
		$('#selectMarca-edit').val(obj[0].idmarca).selectpicker('refresh');
		$('#selectCategorias-edit').val(obj[0].idcategoria).selectpicker('refresh');
		$('#selectSubCategorias-edit').val(obj[0].idsubcategoria).selectpicker('refresh');
		$('#undPack-edit').val(obj[0].undpack);
		$('#stock-edit').val(obj[0].stock);
		$('#valorBruto-edit').val(obj[0].valorbruto);
		$('#valorVenta-edit').val(obj[0].valorventa);

	});

	$('#wmsmodaleditprod-modal').modal();

});

/* BTN-EDIT MODAL ACCION DEFINITIVA */
$('body').on('click', '#btn-edit-prod', function(){

	idproducto = $('#idproducto-val').val();
	nomprod = $('#nameProducto-edit').val();
	idmarca = $('#selectMarca-edit option:selected').val();	
	idsubcategoria = $('#selectSubCategorias-edit option:selected').val();
	undpack = $('#undPack-edit').val();
	stock = $('#stock-edit').val();
	valorbruto = $('#valorBruto-edit').val();
	valorventa = $('#valorVenta-edit').val();

	params = [idproducto, nomprod, idmarca, idsubcategoria, undpack, stock, valorbruto, valorventa];

	$.post(WMS.base_url+'Productos/updateProducto', {params:params}, function(data){

		var obj = JSON.parse(data);

		if(obj == 'ok'){

			$('#wmsmodaleditprod-modal').modal('toggle');
			$('#tblProductos').DataTable().ajax.reload(null, false);

			// Enviar un mensaje en pantalla (Tipo alert)
			$("body").messagefy({
				color: "btn-success",
				title: "Edici&oacute;n Exitosa",
				titleIcon: "ok",
				msg: "<span>Se ha editado correctamente el producto <strong>"+nomprod+"</strong>.</span>"
			});

		}else{

			// Enviar un mensaje en pantalla (Tipo alert)
			$("body").messagefy({
				color: "btn-danger",
				title: "Error!",
				titleIcon: "remove",
				msg: "<p>Ha ocurrido un error!</p>"
			});
		}

	});

});