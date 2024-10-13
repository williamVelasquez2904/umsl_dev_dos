<?php require '../../../cfg/base.php'; ?>
<?php $row = $musuarios->lista(); ?>
<?php if(count($row)>0): ?>
	<div class="table-responsive">
		<table class="table table-hover table-bordered">
			<thead>
				<tr>
					<th>Cédula</th>
					<th>Apellido y Nombre</th>
					<th>Usuario</th>
					<th>Estatus</th>
					<th>Tipo</th>
					<th>Opciones</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($row as $r): 
					if ($r->usua_estado==1) { $estado="Activo"; }
					else { $estado="Inactivo"; } ?>
					<tr>
						<td><?php echo $r->usua_tipo.$r->usua_numiden ?></td>
						<td><?php echo $r->usua_apelli.' '.$r->usua_nombre ?></td>
						<td><?php echo $r->usua_login ?></td>
						<td align="center"><?php echo $estado ?></td>
						<td><?php echo $r->tius_descrip ?></td>
						<td>
							<div class="btn-group">
								<button class="btn btn-success btn-xs" title="Actualizar" onclick="load('vst-usuarios-update','usua_ide=<?php echo $r->usua_ide ?>','.lista');">
									<i class="fa fa-edit"></i>
								</button>
								<button class="btn btn-danger btn-xs" title="Borrar" onclick="modal('vst-usuarios-delete','usua_ide=<?php echo $r->usua_ide ?>')">
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