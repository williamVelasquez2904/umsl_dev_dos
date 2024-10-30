<?php require '../../../cfg/base.php'; 
extract($_POST);
var_dump($pac_ide);
$row = $mconsulta->listaporpaciente($pac_ide);?>
<div>
<label for="" class="label control-label col-sm-12 bolder">Consultas del Paciente:</label>	
</div>
<?php if(count($row)>0): ?>
<div>
	<div class="table-responsive">
		<table class="table10 table-hover table-bordered" width="100%">
			<thead>
				<tr>
					<th align="center" width="5%">Acción</th>
					<th align="center" width="5%">Código</th>
					<th align="center" width="10%">Fecha</th>
					<th align="center" width="5%">Moneda</th>					
					<th align="center" width="5%">Monto Capital</th>
					<th align="center" width="10%">Monto Total</th>
					<th align="center" width="5%">Cuotas</th>
					<th align="center" width="10%">Monto Pagado</th>
					<th align="center" width="10%">Monto Pendiente</th>
					<th align="center" width="5%">Observacion</th>
					<th align="center" width="5%">Modalidad</th>
					<th align="center" width="5%">Estatus</th>
					<th align="center" width="5%">Opción</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($row as $r): ?>
					<?php
					$monto_pendiente=0;
					$clase_fila="";
					if ($r->contrato_modalidad==1){
						$clase_fila="blue";
					}
					if (($r->monto_pagado == null)   AND ($r->monto_pendiente== null)) {
						$monto_pendiente=$r->contrato_saldo;
					}
					if ($r->monto_pagado <> null) {
						$monto_pagado=$r->monto_pagado;
					}
					if ($r->monto_pendiente <> null) {
						$monto_pendiente=$r->monto_pendiente;
					}					
					$modalidad_text='';
						switch ($r->contrato_modalidad) {
						  case 0:
						    $modalidad_text="Banco";
						    break;
						  case 1:
						    $modalidad_text="Tienda";
						  default:						    
						    break;
						  	$modalidad_text="Error.Admin.".$r->contrato_modalidad;
						}
					$estatus_text='';
						switch ($r->contrato_status) {
						  case 0:
						    $estatus_text="Activo";
						    break;
						  case 1:
						    $estatus_text="Inactivo";
						  default:						    
						    break;
						  	$estatus_text="Error.Admin.".$r->contrato_status;
						}
					?>
					<tr class="<?php  echo $clase_fila; ?>">
						<td>
							<div class="btn-group">
								<button class="btn btn-success btn-xs" title="Actualizar" onclick="modal('vst-contrato-update','contrato_ide=<?php echo $r->contrato_ide ?>&clien_ide=<?php echo $clien_ide ?>')">
									<i class="fa fa-edit"></i>
								</button>						
								<button class="btn btn-danger btn-xs" title="Borrar Contrato" onclick="modal('vst-contrato-delete','contrato_ide=<?php echo $r->contrato_ide ?>&clien_ide=<?php echo $clien_ide ?>')">
											<i class="fa fa-trash"></i>
								</button>						
							</div>	
						</td>
						<td align="right" ><?php echo $r->Codigo ?></td>
						<td align="right" ><?php echo $r->Fecha ?></td>
						<td align="right" ><?php echo $r->moneda_abreviada ?></td> 
						<td align="right" ><?php echo number_format($r->Monto,2,",",".") ?></td>
						<td align="right" ><?php echo number_format($r->contrato_saldo,2,",",".")?></td> 
						<td align="right" ><?php echo $r->contrato_cuotas ?></td>
						<td align="right" ><?php echo number_format($r->monto_pagado,2,",",".")?></td>
						<td align="right" ><?php echo number_format($monto_pendiente,2,",",".") ?></td>
						<td align="left" ><?php echo $r->contrato_observacion ?></td> 
						<td align="left" ><?php echo $modalidad_text ?></td> 	
						<td align="left" ><?php echo $estatus_text ?></td> 					
						<td>
							<div class="btn-group">
								<button class="btn btn-info btn-xs" title="Ver Cuota" onclick="modal('vst-cuota-listaCuotas','contrato_ide=<?php echo $r->contrato_ide ?>&contrato_cod=<?php echo $r->Codigo ?>&contrato_modalidad=<?php echo $r->contrato_modalidad ?>')">
									<i class="fa fa-money"></i>
								</button>								
								<button class="btn btn-danger btn-xs" title="Borrar Fraccion" onclick="modal('vst-fracciones-delete_fracc','contrato_ide=<?php echo $r->contrato_ide ?>')">
									<i class="fa fa-trash"></i>
								</button>
		
							</div>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
<script>
	$(function(){
		$('.table10').dataTable();
	})
</script>
<?php else: ?>
	<div class="alert alert-info">No hay registros para mostrar.</div>
<?php endif; ?>	
</div>