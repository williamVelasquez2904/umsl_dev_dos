<?php require '../../../cfg/base.php'; ?>
<?php $row = $minforepi->lista() ?>
<?php if(count($row)>0): ?>
	<div class="table-responsive">
		<table class="table table-hover table-bordered">
			<thead>
				<tr>
					<th>Id</th>
					<th>Empresa</th>
					<th>Descripción</th>
					<th>Desde</th>
					<th>Hasta</th>
					<th>Estatus</th>
					<th>Opciones</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($row as $r): 
					if ($r->inforepi_status=="0") { $estatus="ABIERTO"; }
					elseif ($r->inforepi_status=="1") { $estatus="CERRADO"; }
					else { $estatus="NO DEFINIDO"; }
					?>
					<tr>
						<td align="center"><?php echo $r->inforepi_ide ?></td>
						<td><?php echo $r->compania_nombre ?></td>
						<td><?php echo $r->inforepi_descripcion ?></td>
						<!--	modificado por william 11-12-2024 -->						
						<td><?php echo date('d-m-Y',strtotime($r->inforepi_fecha_desde)) ?></td>
						<td><?php echo date('d-m-Y',strtotime($r->inforepi_fecha_hasta)) ?></td>
						<td><?php echo $estatus ?></td>
						<td align="center">
							<div class="btn-group">
								<button class="btn btn-success btn-xs" title="Actualizar" onclick="modal('vst-inforepi-update','ide=<?php echo $r->inforepi_ide ?>')">
									<i class="fa fa-edit"></i>
								</button>
								<button class="btn btn-danger btn-xs" title="Borrar" onclick="modal('vst-inforepi-delete','ide=<?php echo $r->inforepi_ide ?>')">
									<i class="fa fa-trash"></i>
								</button>
							</div>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
<?php else: ?>
	<div class="alert alert-info">No hay registros para mostrar.</div>
<?php endif; ?>	
<script>
	$(function(){
		$('.table').dataTable();
	})
</script>