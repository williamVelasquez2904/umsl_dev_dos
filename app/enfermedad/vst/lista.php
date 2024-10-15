<?php require '../../../cfg/base.php'; ?>
<?php
var_dump($_POST);

$row = $menfermedad->lista() ?>
<?php if(count($row)>0): ?>
	<div class="table-responsive">
		<table class="table table-hover table-bordered">
			<thead>
				<tr>
					<th>Id</th>
					<th>Enfermedad</th>
					<th>Opciones</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($row as $r): ?>
					<tr>
						<td align="center"><?php echo $r->enf_ide ?></td>
						<td><?php echo $r->enf_descrip ?></td>
						<td>
							<div class="btn-group">
								<button class="btn btn-success btn-xs" title="Actualizar" onclick="modal('vst-enfermedad-update','ide=<?php echo $r->enf_ide ?>')">
									<i class="fa fa-edit"></i>
								</button>
								<button class="btn btn-danger btn-xs" title="Borrar" onclick="modal('vst-enfermedad-delete','ide=<?php echo $r->enf_ide ?>')">
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