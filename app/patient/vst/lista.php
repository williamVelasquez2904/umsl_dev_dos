<?php //require '../../../cfg/base.php'; ?>
<?php $row = $mpatient->paciente_lista() ?>
<?php if(count($row)>0): ?>
	<div class="table-responsive">
		<table class="table table-hover table-bordered">
			<thead>
				<tr>
					<th>Id</th>
					<th>C.I. o R.I.F.</th>
					<th>Nombre</th>
					<th>Apellido</th>
					<th>Sexo</th>
					<th>Fec Nac</th>
					<th>Profesion</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($row as $r): ?>
					<?php  
					if ($r->pac_genero==1) 
					?>
					<tr>
						<td align="center"><?php echo $r->pac_ide ?></td>						
						<td><?php echo $r->pac_tipo.'-'.$r->pac_numiden ?></td>
						<td><?php echo $r->pac_nombre ?></td>
						<td><?php echo $r->pac_apellido ?></td>
						<td><?php 
							echo $r->pac_genero."-".$r->pac_genero==1 ? 'Masculino' : 'Femenino';?>
						</td>
						<td><?php echo $r->pac_fecnaci ?></td>
						<td><?php echo $r->pac_profesion ?></td>
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