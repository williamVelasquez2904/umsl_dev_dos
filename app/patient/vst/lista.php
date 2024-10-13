<?php //require '../../../cfg/base.php'; ?>
<?php $row = $mcliente->lista() ?>
<?php if(count($row)>0): ?>
	<div class="table-responsive">
		<table class="table table-hover table-bordered">
			<thead>
				<tr>
					<th>Id</th>
					<th>Código</th>
					<th>C.I. o R.I.F.</th>
					<th>Nombre</th>
					<th>Alias</th>
					<th>Telefono</th>
					<th>Zona</th>
					<th>Vendedor</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($row as $r): ?>
					<tr>
						<td align="center"><?php echo $r->clien_ide ?></td>
						<td align="center"><?php echo $r->clien_codigo ?></td>
						<td><?php echo $r->clien_tipcli.'-'.$r->clien_numiden ?></td>
						<td><?php echo $r->clien_nombre1 ?></td>
						<td><?php echo $r->clien_nombre2 ?></td>
						<td><?php echo $r->clien_telmovi ?></td>
						<td><?php echo $r->zona_descrip ?></td>
						<td><?php echo $r->vende_razonsocial ?></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
<?php else: ?>
	<div class="alert alert-info">No hay registros de Clientes, Proveedores o Vendedores para mostrar.</div>
<?php endif; ?>	
<script>
	$(function(){
		$('.table').dataTable();
	})
</script>