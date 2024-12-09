<?php require '../../../cfg/base.php'; 
// $row = $mbanco->lista() 
extract($_POST);
/*$row = $mconsulta->listaporpaciente($pac_ide);exit;
*/
$row = $mconsulta->listaporpaciente($pac_ide);

?>
<?php if(count($row)>0): ?>
	<div class="table-responsive">
		<table class="table table-hover table-bordered">
			<thead>
				<tr>
					<th>Id 08 ..</th>
					<th>FECHA</th>
					<th>NOMBRE</th>
					<th>CEDULA</th>
					<th>CONSULTA</th>
					<th>RESULTADO</th>
					<th>Opciones</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($row as $r): 
					$texto_resultado="";
					if ($r->cons_res_ide == 1)
						$texto_resultado='Apto';
					?>
					<tr>
						<td align="center"><?php echo $r->cons_ide ?></td>
						<td align="center"><?php echo $r->cons_fecha ?></td>
						<td><?php echo $r->pac_nombre.', '.$r->pac_apellido  ?></td>
						<td><?php echo $r->pac_numiden ?></td>
						<td><?php echo $r->motivo_descrip ?></td>
						<td><?php echo $texto_resultado ?></td>
						<td>
							<div class="btn-group">
								<button class="btn btn-success btn-xs" title="Actualizar" onclick="modal('vst-consulta-update','ide=<?php echo $r->cons_ide ?>')">
									<i class="fa fa-edit"></i>
								</button>
								<button class="btn btn-danger btn-xs" title="Borrar" onclick="modal('vst-cons-delete','ide=<?php echo $r->cons_ide ?>')">
									<i class="fa fa-trash"></i>
								</button>
								<button class="btn btn-success btn-xs" title="Ver detalles" onclick="modal('vst-consulta-verdetalles','ide=<?php echo $r->cons_ide ?>')">
									<i class="fa fa-edit"></i>
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