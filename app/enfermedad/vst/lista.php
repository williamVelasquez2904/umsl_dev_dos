<?php require '../../../cfg/base.php';
$row = $menfermedad->lista();
if(count($row)>0): ?>
	<div class="table-responsive">
		<table class="table table-hover table-bordered">
			<thead>
				<tr>
					<th width="5%">Id</th>
					<th width="65%">Enfermedad</th>
					<th width="10%">Amerita Notificar INPSASEL</th>
					<th width="10%">Amerita Certificación Discapacidad</th>
					<th width="10%">Opciones</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($row as $r): ?>
					<tr>
						<td align="center"><?php echo $r->enf_ide ?></td>
						<td><?php echo $r->enf_descrip ?></td>
						<td align="center"><?php echo $r->enf_noti_inpsasel_desc ?></td>
						<td align="center"><?php echo $r->enf_certi_discapacidad_desc ?></td>
						<td align="center">
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