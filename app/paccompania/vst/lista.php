<?php require '../../../cfg/base.php';
extract($_POST);
$row_paciente= $mpatient->poride($pac_ide);
$ced="";
foreach($row_paciente as $c): 
	$ced=$c->pac_numiden;
endforeach; 
$row=$mpaccompania->companias_por_pac_ide($pac_ide);?>
<div class="btn-group pull-right">
		<button class="btn btn-inverse" onclick="modal('vst-paccompania-insert','pac_ide=<?php echo $pac_ide ?>')">
			<i class="fa fa-plus"></i>
			Vincular Empresa 03-12-24
		</button>
</div>
<?php if(count($row)>0): ?>
	<div class="table-responsive">
		<table class="table_paciente_companias_update table-hover table-bordered" width="100%">
			<thead>
				<tr>
					<th>Id</th>
					<th>Empresa</th>
					<th>Cargo</th>
					<th>Opciones</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($row as $r): ?> 
					<tr>
						<td align="center"><?php echo $r->paccia_ide ?></td>
						<td><?php echo $r->compania_rif.'-'.$r->compania_nombre ?></td>
						<td><?php echo $r->cargo_descrip ?></td>
						<td>
							<div class="btn-group">
								<button class="btn btn-success btn-xs" title="Actualizar" onclick="modal('vst-clientecuenta-update','ide=<?php echo $r->ctecue_ide ?>&clien_ide2=<?php echo $r->ctecue_clien_ide ?>&clien_ced=<?php echo $ced ?>')">
									<i class="fa fa-edit"></i>
								</button>
								<button class="btn btn-danger btn-xs" title="Borrar" onclick="modal('vst-clientecuenta-delete','ide=<?php echo $r->ctecue_ide ?>')">
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
		$('.table_paciente_companias_update').dataTable();
	})
</script>