<?php require '../../../cfg/base.php';  
/*
		var_dump("<PRE>");
		var_dump("En datos personales pac ide = ".$pac_ide);
		var_dump("</pre>");*/
//var_dump($pac_ide);
$row = $mpatient->poride($pac_ide);
$row_fich = $mpermfich->poride(1);
?>
<div class="col-sm-12 widget-container-span ui-sortable" id="ficha-<?php echo  $row_fich[0]->fich_ide ?>-link">
	<div class="widget-box revival">
		<div class="widget-header widget-hea1der-small header-color-dark">
			<h6 class="bolder"><i class="fa fa-<?php echo $row_fich[0]->fich_icono; ?>"></i> <?php echo $row_fich[0]->fich_descrip; ?></h6>
			<div class="widget-toolbar">
				<a href="#" data-action="reload" onclick="load('<?php echo $row_fich[0]->fich_url ?>','fich_ide=<?php echo $row_fich[0]->fich_ide ?>&clien_ide=<?php echo $clien_ide ?>','#ficha-<?php echo $row_fich[0]->fich_ide ?>');">
					<i class="icon-refresh"></i>
				</a>
				<a href="#" data-action="collapse">
					<i class="icon-chevron-up"></i>
				</a>						
			</div>
		</div>
		<div class="widget-body">
			<div class="widget-main">

				<div class="col-sm-10">
					<div class="table-responsive">
						<table class="table table-bordered">
							<tr>
								<th class="active text-right">Nacionalidad:</th>
								<td>
									<?php echo $row[0]->pac_tipo; ?>
								</td>
							</tr>
							<tr>
								<th class="active text-right">Número de Identificación:</th>
								<td><?php echo $row[0]->pac_numiden ?></td>	
								<th class="active text-right">Razón Social o Nombre:</th>
								<td><?php echo $row[0]->pac_nombre.' '.$row[0]->pac_apellido ?></td>
							</tr>
							<tr>
								<th class="active text-right">Fecha de Nacimiento:</th>
								<td><?php echo date('d-m-Y',strtotime($row[0]->pac_fecnaci)); ?></td>
								<th class="active text-right">Sexo:</th>
								<td><?php echo funciones::getGenero($row[0]->pac_genero); ?></td>
								
							</tr>
							<tr>
								<th class="active text-right">Profesión:</th>
								<td>
									<?php echo $row[0]->profesion; ?>
								</td>
							</tr>
							<tr>
								<th class="active text-right">Dirección:</th>
								<td>
									<?php echo $row[0]->pac_direcci; ?>
								</td>
							</tr>

						</table>
					</div>

					<div class="btn-group pull-right">
						<button type="button" class="btn btn-primary" onclick="load('vst-patient-update','pac_ide=<?php echo $row[0]->pac_ide ?>','.perfil')"><i class="fa fa-edit"></i> Editar Datos</button>
						<!--<button type="button" class="btn btn-purple" onclick="load('vst-cliente-','clien_ide=<?php echo $row[0]->clien_ide ?>','.perfil')"><i class="fa fa-info"></i> Ver Detalles</button>-->
						<button type="button" class="btn btn-danger" onclick="modal('vst-cliente-delete','clien_ide=<?php echo $row[0]->clien_ide ?>')"><i class="fa fa-trash"></i> Borrar</button>
					</div>
				</div>
				<div class="clearfix"></div>
				<div class="space-10"></div>
			</div>
		</div>
	</div>
</div>