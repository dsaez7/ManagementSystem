
<h1><?= $title ?></h1>

<div class="line"></div>

<div class="row">
	
	<div class="col-lg-12">
		<div class="panel panel-primary">
		  <div class="panel-heading">
		  	<span class="glyphicon glyphicon-th-list"></span> Listado de Productos
		  	<button class="btn btn-success btn-xs pull-right btn-addnuevoprod"><i class="glyphicon glyphicon-plus"></i> Agregar Nuevo Producto</button>
		  </div>
		  <div class="panel-body">

		  	<div class="table-responsive">
		  	  <table id="tblProductos" class="table table-striped table-condensed table-bordered" style="font-size: 11px;">
		  	    <thead>
		  	      <tr>
		  	        <th style="width: 15%;">Categoria</th>
		  	        <th style="width: 10%;">Subcategoria</th>
		  	        <th style="width: 10%;">Marca</th>
		  	        <th style="width: auto;">Nombre</th>
		  	        <th style="width: 8%;">$ Bruto</th>
		  	        <th style="width: 8%;">$ Venta</th>
		  	        <th style="width: 8%;">$ Oferta</th>
		  	        <th style="width: 5%;">Stock</th>
		  	        <th style="width: 5%;"></th>
		  	      </tr>
		  	    </thead>
		  	    <tbody>

		  	    </tbody>
		  	  </table>
		  	</div>

		  </div>
		</div>
	</div>

</div>

<div class="row">
	
	<div class="col-lg-12">

		<!-- Modal Add Producto-->
		<div class="modal fade" id="wmsaddproducto-modal" role="dialog">
		  <div class="modal-dialog">
		  
		    <!-- Modal content-->
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h4 class="modal-title"><i class="fas fa-check-circle"></i> Agregar un Nuevo Producto</h4>
		      </div>		      

		      <form>
		      	<div class="modal-body">

		      		<!-- NOMBRE / MARCA -->
		      		<div class="row">

		      			<div class="col-lg-6">
		      				<div class="form-group">
		      					<label for="nameProducto">Nombre Producto</label>
		      					<input type="text" class="form-control" id="nameProducto">
		      				</div>
		      			</div>

		      			<div class="col-lg-6">
		      				<div class="form-group">
			      				<label for="selectMarca">Marca</label>
			      				<select id="selectMarca" class="selectpicker form-control" data-live-search="true" name="marca">
			      					<?php  foreach($getMarcas as $item): ?>
			      						<option value="<?= $item->idmarca ?>"><?= $item->nombre ?></option>
			      					<?php  endforeach; ?>
			      				</select>
		      				</div>
		      			</div>

		      		</div>

		      		<!-- CATEGORIA / SUBCATEGORIA -->
		      		<div class="row">

		      			<div class="col-lg-6">
		      				<div class="form-group">
			      				<label for="selectCategorias">Categoria</label>
			      				<select id="selectCategorias" class="selectpicker form-control" data-live-search="true" name="categoria">
			      					<?php foreach($getCategorias as $item): ?>
			      						<option value="<?= $item->idcategoria ?>"><?= $item->nombre ?></option>
			      					<?php endforeach; ?>
			      				</select>
		      				</div>
		      			</div>

		      			<div class="col-lg-6">
		      				<div class="form-group">
		      					<label for="selectSubCategorias">Subcategoria</label>
		      					<select id="selectSubCategorias" class="selectpicker form-control" data-live-search="true" name="subcategoria">
		      					</select>
		      				</div>
		      				
		      			</div>

		      		</div>

		      		<!-- UND PACK / STOCK -->
		      		<div class="row">

		      			<div class="col-lg-6">
		      				<div class="form-group">
		      					<label for="undPack">Und Pack</label>
		      					<input type="text" class="form-control" id="undPack" name="unidadpack">
		      				</div>
		      			</div>

		      			<div class="col-lg-6">
		      				<div class="form-group">
		      					<label for="stock">Stock</label>
		      					<input type="text" class="form-control" id="stock" name="x_stock">
		      				</div>
		      			</div>

		      		</div>

		      		<!-- VALOR BRUTO / VALOR NETO -->
		      		<div class="row">

		      			<div class="col-lg-6">
		      				<div class="form-group">
		      					<label for="valorBruto">Valor Bruto</label>
		      					<input type="text" class="form-control" id="valorBruto" name="brutovalor">
		      				</div>
		      			</div>

		      			<div class="col-lg-6">
		      				<div class="form-group">
		      					<label for="valorVenta">Valor Venta</label>
		      					<input type="text" class="form-control" id="valorVenta" name="ventavalor">
		      				</div>
		      			</div>

		      		</div>

		      	</div>

		      	<div class="modal-footer">
		      		<button id="btn-new-prod" type="button" class="btn btn-primary">Agregar</button>
		      		<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
		      	</div>
		      </form>
		    </div>
		    
		  </div>
		</div>

	</div>

</div>

<div class="row">
	
	<div class="col-lg-12">

		<!-- Modal Edit Producto-->
		<div class="modal fade" id="wmsmodaleditprod-modal" role="dialog">
		  <div class="modal-dialog">
		  
		    <!-- Modal content-->
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h4 class="modal-title"><i class="fas fa-check-circle"></i> Editar un Producto</h4>
		      </div>		      

		      <form>
		      	<div class="modal-body">

		      		<!-- NOMBRE / MARCA -->
		      		<div class="row">

		      			<div class="col-lg-6">
		      				<div class="form-group">
		      					<label for="nameProducto-edit">Nombre Producto</label>
		      					<input type="text" class="form-control" id="nameProducto-edit" name="nameProducto-edit">
		      				</div>
		      			</div>

		      			<div class="col-lg-6">
							<div class="form-group">
			      				<label for="selectMarca-edit">Marca</label>
			      				<select id="selectMarca-edit" class="selectpicker form-control" data-live-search="true" name="marca-edit">
			      					<option value="0">Seleccione una Opci&oacute;n</option>
			      					<?php  foreach($getMarcas as $item): ?>
			      						<option value="<?= $item->idmarca ?>"><?= $item->nombre ?></option>
			      					<?php  endforeach; ?>
			      				</select>
							</div>
		      			</div>

		      		</div>

		      		<!-- CATEGORIA / SUBCATEGORIA -->
		      		<div class="row">

		      			<div class="col-lg-6">
		      				<div class="form-group">
		      					<label for="selectCategorias-edit">Categoria</label>
		      					<select id="selectCategorias-edit" class="selectpicker form-control" data-live-search="true" name="categoria-edit">
		      						<?php foreach($getCategorias as $item): ?>
		      							<option value="<?= $item->idcategoria ?>"><?= $item->nombre ?></option>
		      						<?php endforeach; ?>
		      					</select>
		      				</div>
		      			</div>

		      			<div class="col-lg-6">
		      				<div class="form-group">
		      					<label for="selectSubCategorias-edit">Subcategoria</label>
		      					<select id="selectSubCategorias-edit" class="selectpicker form-control" data-live-search="true" name="subcategoria-edit">
		      						<?php foreach($getSubCategorias as $item): ?>
		      							<option value="<?= $item->idsubcategoria ?>"><?= $item->nombre ?></option>
		      						<?php endforeach; ?>
		      					</select>
		      				</div>
		      			</div>

		      		</div>

		      		<!-- UND PACK / STOCK -->
		      		<div class="row">

		      			<div class="col-lg-6">
		      				<div class="form-group">
		      					<label for="undPack-edit">Und Pack</label>
		      					<input type="text" class="form-control" id="undPack-edit" name="unidadpack-edit">
		      				</div>
		      			</div>

		      			<div class="col-lg-6">
		      				<div class="form-group">
		      					<label for="stock-edit">Stock</label>
		      					<input type="text" class="form-control" id="stock-edit" name="x_stock-edit">
		      				</div>
		      			</div>

		      		</div>

		      		<!-- VALOR BRUTO / VALOR NETO -->
		      		<div class="row">

		      			<div class="col-lg-6">
		      				<div class="form-group">
		      					<label for="valorBruto-edit">Valor Bruto</label>
		      					<input type="text" class="form-control" id="valorBruto-edit" name="brutovalor-edit">
		      				</div>
		      			</div>

		      			<div class="col-lg-6">
		      				<div class="form-group">
		      					<label for="valorVenta-edit">Valor Venta</label>
		      					<input type="text" class="form-control" id="valorVenta-edit" name="ventavalor-edit">
		      				</div>
		      			</div>

		      		</div>

		      	</div>

		      	<div class="modal-footer">
		      		<button type="button" id="btn-edit-prod" class="btn btn-primary">Editar</button>
		      		<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
		      	</div>
		      </form>
		    </div>
		    
		  </div>
		</div>

	</div>

</div>

<input type="text" class="hidden" id="idproducto-val" value="">

<script src="<?=assets_url()?>js/productos/productos.js?ver=<?=rand()?>"></script>
