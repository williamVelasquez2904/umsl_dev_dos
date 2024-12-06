<?php require '../../../cfg/base.php';
$row = $mcompania->lista();
if(count($row)>0): ?>
	<div class="table-responsive">
		<table class="table table-hover table-bordered">
			<thead>
				<tr>
					<th>RIF</th>
					<th>Nombre o Razón Social</th>
					<th>Telefono</th>
					<th>Dirección</th>
					<th>Email</th>
					<th>Opciones</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($row as $r): ?>
					<tr>
						<td align="center"><?php echo $r->compania_rif ?></td>
						<td><?php echo $r->compania_nombre .' <b>'.$r->compania_nombre2.'</b>'; ?></td>
						<td><?php echo $r->compania_telefono ?></td>
						<td><?php echo $r->compania_direccion ?></td>
						<td><?php echo $r->compania_email ?></td>
						<td>
							<div class="btn-group">
								<button class="btn btn-success btn-xs" title="Actualizar" onclick="modal('vst-compania-update','ide=<?php echo $r->compania_ide ?>')">
									<i class="fa fa-edit"></i>
								</button>
								<button class="btn btn-danger btn-xs" title="Borrar" onclick="modal('vst-compania-delete','ide=<?php echo $r->compania_ide ?>')">
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