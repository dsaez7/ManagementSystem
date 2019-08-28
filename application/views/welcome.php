
<h1><?= $title ?></h1>

<div class="line"></div>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-primary">
		  <div class="panel-heading">
		  	<i class="fas fa-tachometer-alt"></i> Indicadores Principales
		  </div>
		  <div class="panel-body">

			  	<div class="col-md-3 col-sm-6 col-xs-12">
			  		<div class="info-box">
			  			<span class="info-box-icon bg-green">
			  				<i class="far fa-money-bill-alt" style="color: #fff;"></i>
			  			</span>

			  			<div class="info-box-content">
			  				<span class="info-box-text">Valor Bruto Inventario</span>
			  				<span class="info-box-number"><?= $valorInventario ?></span>
			  			</div>
			  		</div>
			  	</div>
			
		  </div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-primary">
		  <div class="panel-heading">
		  	<i class="far fa-money-bill-alt"></i> Valorizaci&oacute;n de Categorias
		  </div>
		  <div class="panel-body">
		
			<div class="col-lg-6">
					
				<div class="panel panel-info">
				  <div class="panel-heading">
				  	<i class="fas fa-database"></i> Data
				  </div>
				  <div class="panel-body">
				  	<div class="table-responsive">
				  	  <table id="datatable" class="table table-striped hidden">

				  		<thead>
				  			<tr>
				  				<th>Categoria</th>
				  				<th>Valorizaci&oacute;n</th>
				  			</tr>
				  	  	</thead>
				  	  	<tbody>
				  	  		<?php foreach($valorizacionCategorias as $item): ?>
				  	  			<tr>
				  	  				<td> <?= $item->nombre ?> </td>
				  	  				<td> <?= $item->valorInventario ?> </td>
				  	  			</tr>
				  	  		<?php endforeach; ?>
				  	  	</tbody>

				  	  </table>
				  	</div>

				  	<div class="table-responsive">
				  	  <table class="table table-striped" style="font-size: 12px; height: 430px;">

				  		<thead>
				  			<tr>
				  				<th>Categoria</th>
				  				<th>Valorizaci&oacute;n</th>
				  			</tr>
				  	  	</thead>
				  	  	<tbody>
				  	  		<?php foreach($valorizacionCategorias as $item): ?>
				  	  			<tr>
				  	  				<td> <?= $item->nombre ?> </td>
				  	  				<td> <?= '$'.number_format($item->valorInventario, 0,',', '.') ?> </td>
				  	  			</tr>
				  	  		<?php endforeach; ?>
				  	  	</tbody>

				  	  </table>
				  	</div>
				  </div>
				</div>
			</div>

			<div class="col-lg-6">				
				<div class="panel panel-info">
				  <div class="panel-heading">
				  	<i class="fas fa-chart-bar"></i> Gr&aacute;fico
				  </div>
				  <div class="panel-body">
				  	<div id="container" style="min-width: 310px; height: 450px; margin: 0 auto"></div>
				  </div>
				</div>				
			</div>
			
		  </div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-primary">
		  <div class="panel-heading">
		  	<i class="far fa-money-bill-alt"></i> Valorizaci&oacute;n de Bancos de Semillas
		  </div>
		  <div class="panel-body">
		
			<div class="col-lg-6">
					
				<div class="panel panel-info">
				  <div class="panel-heading">
				  	<i class="fas fa-database"></i> Data
				  </div>
				  <div class="panel-body">
				  	<div class="table-responsive">
				  	  <table id="datatableSecond" class="table table-striped hidden">

				  		<thead>
				  			<tr>
				  				<th>Banco</th>
				  				<th>Valorizaci&oacute;n</th>
				  			</tr>
				  	  	</thead>
				  	  	<tbody>
				  	  		<?php foreach($valorBancos as $item): ?>
				  	  			<tr>
				  	  				<td> <?= $item->nombre ?> </td>
				  	  				<td> <?= $item->valorBanco ?> </td>
				  	  			</tr>
				  	  		<?php endforeach; ?>
				  	  	</tbody>

				  	  </table>
				  	</div>
					
				  	<div class="table-responsive">
				  	  <table class="table table-striped" style="font-size: 12px; height: 430px;">

				  		<thead>
				  			<tr>
				  				<th>Banco</th>
				  				<th>Valorizaci&oacute;n</th>
				  			</tr>
				  	  	</thead>
				  	  	<tbody>
				  	  		<?php foreach($valorBancos as $item): ?>
				  	  			<tr>
				  	  				<td> <?= $item->nombre ?> </td>
				  	  				<td> <?= '$'.number_format($item->valorBanco, 0,',', '.') ?> </td>
				  	  			</tr>
				  	  		<?php endforeach; ?>
				  	  	</tbody>

				  	  </table>
				  	</div>
				  </div>
				</div>
			</div>

			<div class="col-lg-6">				
				<div class="panel panel-info">
				  <div class="panel-heading">
				  	<i class="fas fa-chart-bar"></i> Gr&aacute;fico
				  </div>
				  <div class="panel-body">
				  	<div id="containerSecond" style="min-width: 310px; height: 450px; margin: 0 auto"></div>
				  </div>
				</div>				
			</div>
			
		  </div>
		</div>
	</div>
</div>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="<?=assets_url()?>js/welcome/welcome.js"></script>