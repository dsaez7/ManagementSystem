
<h1><?= $title ?></h1>

<div class="line"></div>

<div class="row">
	
	<div class="col-lg-4">
		
		<div class="panel panel-primary">

		  <div class="panel-heading"><i class="fas fa-filter"></i> Filtros para B&uacute;squeda</div>

		  <div class="panel-body">
		  	
			
		  	<div class="row">
		  		<div class="col-lg-12">
		  			<div class="form-group">
		  				<label for="selectCategorias">Categoria</label>
		  				<select id="selectCategorias" class="selectpicker show-tick form-control" data-live-search="true">
		  					<option value="0">Seleccione una Opci&oacute;n</option>
		  					<?php foreach($getCategorias as $item): ?>
		  						<option value="<?= $item->idcategoria ?>"><?= $item->nombre ?></option>
		  					<?php endforeach; ?>
		  				</select>
		  			</div>
		  		</div>
		  	</div>
			
			<div class="row">
				<div class="col-lg-12">
					<div class="form-group">
						<label for="selectSubCategorias">Subcategoria</label>
						<select id="selectSubCategorias" class="selectpicker show-tick form-control" data-live-search="true">

						</select>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-12">
					<button id="btn-filtrar-sc" class="btn btn-success btn-block" data-sku="1"><i class="fas fa-filter"></i> Filtrar</button>
				</div>
			</div>

			<hr>

			<div class="row">
				<div class="col-lg-12">
					<div class="form-group">
						<label for="selectMarca">Marca</label>
						<select id="selectMarca" class="selectpicker show-tick form-control" data-live-search="true">
							<option value="0">Seleccione una Opci&oacute;n</option>
							<?php  foreach($getMarcas as $item): ?>
								<option value="<?= $item->idmarca ?>"><?= $item->nombre ?></option>
							<?php  endforeach; ?>
						</select>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-12">
					<button id="btn-filtrar-m" class="btn btn-success btn-block" data-sku="2"><i class="fas fa-filter"></i> Filtrar</button>
				</div>
			</div>

		  </div>
		
		</div>

	</div>

	<div class="col-lg-8">

		<div class="panel panel-primary">
		  
		  <div class="panel-heading">
		  	<i class="fab fa-facebook-square"></i> Listado Personalizado para RR.SS
		  </div>
		  
		  <div id="listado" class="panel-body">
		  	
		  	<div class="col-lg-12 clipboard">
		  		<p> Vamos.. escoge tus filtros (= </p>
		  	</div>

		  </div>
		
		</div>

	</div>	

</div>

<svg xmlns="http://www.w3.org/2000/svg" style="display: none">
    <symbol id="icon-copy" viewBox="0 0 32 32">
        <path d="M20 8v-8h-14l-6 6v18h12v8h20v-24h-12zM6 2.828v3.172h-3.172l3.172-3.172zM2 22v-14h6v-6h10v6l-6 6v8h-10zM18 10.828v3.172h-3.172l3.172-3.172zM30 30h-16v-14h6v-6h10v20z"></path>
    </symbol>
</svg>

<div id="target" contentEditable="true"></div>

<script src="<?=assets_url()?>js/productos/listado.js?ver=<?=rand()?>"></script>
