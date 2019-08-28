
<h1><?= $title ?></h1>

<div class="line"></div>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-primary">
		  
		  <div class="panel-heading">
		  	<i class="fas fa-address-book"></i> Cartera de Clientes (En Construcci&oacute;n)
		  	<button class="btn btn-success btn-xs pull-right btn-addnuevocli"><i class="glyphicon glyphicon-plus"></i> Agregar Nuevo Cliente</button>
		  </div>
		  
		  <div class="panel-body">
		  
		  	<div class="row">
		  		<div class="col-lg-12">
		  			
		  			<div class="table-responsive">
		  			  <table id="tblClientes" class="table table-striped table-bordered" style="font-size: 11px;">
		  			    <thead>
		  			      <tr>
		  			        <th>Apellido Paterno</th>
		  			        <th>Apellido Materno</th>
		  			        <th>Nombre</th>
		  			        <th>Email</th>
		  			        <th>Telefono</th>
		  			        <th>Fecha Nacimiento</th>
		  			      </tr>
		  			    </thead>
		  			    <tbody>
		  			    	<?php foreach ($clientes as $item): ?>
								<tr>
									<td><?= $item->apellidopat ?></td>
									<td><?= $item->apellidomat ?></td>
									<td><?= $item->nombre ?></td>
									<td><?= $item->email ?></td>
									<td><?= $item->telefono ?></td>
									<td><?= $item->fechanacimiento ?></td>
								</tr>
		  			    	<?php endforeach; ?>
		  			    </tbody>
		  			  </table>
		  			</div>


		  		</div>
		  	</div>

		  </div>
		
		</div>
	</div>
</div>


<div class="row">
	
	<div class="col-lg-12">

		<!-- Modal Add Producto-->
		<div class="modal fade" id="wmsaddcli-modal" role="dialog">
		  <div class="modal-dialog">
		  
		    <!-- Modal content-->
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h4 class="modal-title"><i class="fas fa-check-circle"></i> Agregar un Nuevo Cliente</h4>
		      </div>
		      <div class="modal-body">

		      	<!-- <form action="<?= base_url()?>Clientes/add" method="POST"> -->
		      		
					<!-- NOMBRE / APELLIDOS -->
			      	<div class="row">

			      		<div class="col-lg-4">
			      			<div class="form-group">
			      			  <label for="nameCli">Nombre</label>
			      			  <input type="text" class="form-control" id="nameCli" placeholder="David">
			      			</div>
			      		</div>

			      		<div class="col-lg-4">
			      			<div class="form-group">
			      			  <label for="apPat">Apellido Paterno</label>
			      			  <input type="text" class="form-control" id="apPat" placeholder="S&aacute;ez">
			      			</div>
			      		</div>

			      		<div class="col-lg-4">
			      			<div class="form-group">
			      			  <label for="apMat">Apellido Materno</label>
			      			  <input type="text" class="form-control" id="apMat" placeholder="Andreus">
			      			</div>
			      		</div>

			      	</div>

					<!-- EMAIL -->
			      	<div class="row">
			      		
			      		<div class="col-lg-12">
			      			<div class="form-group">
			      			  <label for="emailCli">Email</label>
			      			  <input type="text" class="form-control" id="emailCli" placeholder="tumail@gmail.com">
			      			</div>
			      		</div>

			      	</div>

	      			<!-- TELEFONO / NACIMIENTO -->
	      	      	<div class="row">
	      	      		
	      	      		<div class="col-lg-6">
	      	      			<div class="form-group">
	      	      			  <label for="phoneCli">Telefono</label>
	      	      			  <input type="text" class="form-control" id="phoneCli" placeholder="+56952056660">
	      	      			</div>
	      	      		</div>

	      	      		<div class="col-lg-6">
	      	      			<div class="form-group">
	      	      			  <label for="fNac">Fecha Nacimiento</label>
	      	      			  <input type="text" class="form-control" id="fNac" placeholder="15/03/1993">
	      	      			</div>
	      	      		</div>

	      	      	</div>



		      	<!-- </form> -->

		      </div>
		      <div class="modal-footer">
		        <button type= "button" class="btn btn-primary btn-add-cli">Agregar</button>
		        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
		      </div>
		    </div>
		    
		  </div>
		</div>

	</div>

</div>

<script>
	/* DATATABLE PRODUCTOS */
	tbl = $(document).ready(function() {
	    
	    $('#tblClientes').DataTable({
	    	"language": {    
	    	    "url" : "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
	    	}
	    });

	});
</script>
<script src="<?=assets_url()?>js/clientes/clientes.js"></script>