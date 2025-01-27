<?php require '../../../cfg/base.php'; ?>
<?php
//var_dump($_POST);

$row = $mmotivo->lista() ?>
<?php if(count($row)>0): ?>
	<div class="table-responsive">
		<table class="table table-hover table-bordered">
			<thead>
				<tr>
					<th>Id 23 ene 25</th>
					<th>Motivo</th>
					<th>Opciones</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($row as $r): ?>
					<tr>
						<td align="center"><?php echo $r->motivo_ide ?></td>
						<td><?php echo $r->motivo_descrip ?></td>
						<td>
							<div class="btn-group">
								<button class="btn btn-success btn-xs" title="Actualizar" onclick="modal('vst-motivo-update','ide=<?php echo $r->motivo_ide ?>')">
									<i class="fa fa-edit"></i>
								</button>
								<button class="btn btn-danger btn-xs" title="Borrar" onclick="modal('vst-motivo-delete','ide=<?php echo $r->motivo_ide ?>')">
									<i class="fa fa-trash"></i>
								</button>
							</div>
						</td>
					</tr>
				<?php endforeach; ?>
				<?php  ?>
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