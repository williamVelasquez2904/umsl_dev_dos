<?php require '../../../cfg/base.php'; ?>
<?php
//var_dump($_POST);
$row = $menfermedad->porconsul($ide) // enfermedades reportadas en una consulta
/*$row = $mconsulta->lista_enfer($ide) */
?>
<?php if(count($row)>0): ?>
	<div class="table-responsive">
		<table class="table2 table-hover table-bordered " width="100%" align="center" >
			<thead>
				<tr>
					<th>Id 05feb</th>
					<th>Enfermedad</th>
					<th>Opción</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($row as $r): ?>
					<tr>
						<td align="center"><?php echo $r->consenf_ide ?></td>
						<td><?php echo $r->enfermedad ?></td>
						<td>
							<div class="btn-group">
								<button class="btn btn-danger btn-xs" title="Borrar" onclick="modal('vst-consulta-delete_enf','ide=<?php echo $r->consenf_ide ?>')">
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
		$('.table2').dataTable();
	})
</script>
