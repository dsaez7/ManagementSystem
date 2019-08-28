<h1><?= $title ?></h1>
<div class="line"></div>

<div class="row">
	
	<div class="col-lg-12">
		<div class="panel panel-danger">
		  <div class="panel-heading">
		  	<span class="glyphicon glyphicon-th-list"></span> Listado de Productos Agotados
		  </div>
		  <div class="panel-body">

		  	<div class="table-responsive">
		  	  <table id="tblAgotados" class="table table-striped table-bordered" style="font-size: 11px;">
		  	    <thead>
		  	      <tr>
		  	        <th>Categoria</th>
		  	        <th>Subcategoria</th>
		  	        <th>Marca</th>
		  	        <th>Nombre</th>
		  	        <th>Und Pack</th>
		  	        <th>$ Bruto</th>
		  	        <th>$ Venta</th>
		  	        <th>Stock</th>
		  	      </tr>
		  	    </thead>
		  	    <tbody>
					<?php foreach ($productosAgotados as $item): ?>
						<tr>
							<td><?=$item->nombreCategoria?></td>
							<td><?= $item->nombreSub ?></td>
							<td><?= $item->nombreMarca ?></td>
							<td><?= $item->nombreProducto ?></td>
							<td><?= $item->undPack ?></td>
							<td><?= '$'.number_format($item->valorBruto, 0, ',', '.') ?></td>
							<td><?= '$'.number_format($item->valorVenta, 0, ',', '.') ?></td>
							<td><?= $item->stock ?></td>
						</tr>
					<?php endforeach; ?>
		  	    </tbody>
		  	  </table>
		  	</div>

		  </div>
		</div>
	</div>

</div>