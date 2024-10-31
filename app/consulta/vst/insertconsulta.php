<?php require '../../../cfg/base.php'; 
extract($_POST);
//se busca la Cantidad de consultas  del paciente
$row=$mconsulta->porpac_ide($pac_ide);
var_dump($row);


?>
<div id="mensaje"></div> 
<div class="">
	<label for="" class="label control-label col-sm-12 bolder">Datos de la Consulta</label>
</div>

<div class="alert alert-info">
	<i class="fa fa-exclamation-triangle fa-3x pull-left red"></i> Por favor rellene el siguiente formulario para agregar consulta.
</div>
<form action="" class="datosconsulta">
	<div class="msj-errores" id="errores_contrato"></div>
	
	<fieldset><legend>Datos de la Consulta</legend>	

		<input type="hidden" name="clien_ide" class="form-control" value="<?php echo $clien_ide; ?>"> 
		<input type="hidden" name="consec"    class="form-control" value="<?php echo $consecutivo; ?>"> 
		
		<div class="form-group col-sm-2">
			<label for="" class="label control-label col-sm-12 bolder">Aplica para</label>
			<div class="col-sm-12" id="tienda">
				<select class="form-control chosen" title="Tienda" name="tie" id="tie">
					<option value=""></option>
					<?php foreach($mtienda->lista() as $t): ?>
						<option value="<?php echo $t->empresa_ide; ?>"
							<?php 
							if ($t->empresa_ide==1) echo "selected";
							?>
						>
					<?php echo $t->empresa_nombre; ?></option>
					<?php endforeach; ?>
				</select>
			</div>
		</div>

		<div class="form-group col-sm-2">
			<label for="" class="label control-label col-sm-12 bolder">Fecha Consulta</label>
			<div class="col-sm-12">
				<div class="input-group">
					<input type="text" name="fec" id="fec" class="fecha form-control" data-date-format="yyyy-mm-dd" value="">
					<span class="input-group-addon">
						<i class="icon-calendar bigger-110"></i>
					</span>
				</div>
			</div>
		</div>
		<div class="form-group col-sm-2">
			<label for="" class="label control-label col-sm-12 bolder">Fecha Inicio de Cobro:</label>
			<div class="col-sm-12">
				<div class="input-group">
					<input type="text" name="fec_ini_cob" id="fec_ini_cob" class="fecha form-control" data-date-format="yyyy-mm-dd" value="">
					<span class="input-group-addon">
						<i class="icon-calendar bigger-110"></i>
					</span>
				</div>
			</div>
		</div>
		<div class="form-group col-sm-2">
			<label for="" class="label control-label col-sm-12 bolder">Moneda</label>
			<div class="col-sm-12" id="mone">
				<select class="form-control chosen" title="Moneda" name="mone" id="mone" >
					<option value=""></option>
					<?php foreach($mmoneda->lista() as $m): ?>
						<option value="<?php echo $m->moneda_ide ?>"
							<?php 
							if ($m->moneda_ide==1) echo "selected";
							?>
						>
							<?php echo $m->moneda_ide.'-'. $m->moneda_abreviada ?></option>
					<?php endforeach; ?>
				</select>
			</div>
		</div>		
		<div class="form-group col-sm-2">
			<label for="" class="label control-label col-sm-12 bolder">Monto Capital</label>
			<div class="col-sm-12">
				<input type="text" name="mto" class="form-control" value="">
			</div>
		</div>

		<div class="form-group col-sm-2">
			<label for="" class="label control-label col-sm-12 bolder">Cuotas:</label>
			<div class="col-sm-12">
				<input type="number" min="0" name="cuo" class="form-control" value ="">
			</div>
		</div>		
		<div class="clearfix"></div>

		<div class="form-group col-sm-4">
			<label for="" class="label control-label col-sm-12 bolder">Banco/Tienda</label>
			<div class="col-sm-12" id="banco_ide">
				<select class="form-control chosen" title="Banco o Tienda" name="banco_ide" id="banco_ide" >
					<option value=""></option>
					<?php foreach($mbanco->lista() as $b): ?>
						<option value="<?php echo $b->banco_ide ?>"
						>
						<?php echo $b->banco_descrip ?></option>
					<?php endforeach; ?>
				</select>
			</div>
		</div>
		<div class="form-group col-sm-4">
			<label for="" class="label control-label col-sm-12 bolder">Cuenta Bancaria</label>
			<div class="col-sm-12" id="cuenta_ide">
				<select class="form-control chosen" title="cuenta Bancaria" name="cuenta_ide" id="cuenta_ide" >
					<option value=""></option>
					<?php foreach($mclientecuenta->cuentas_por_clien_ide($clien_ide) as $p): ?>
						<option value="<?php echo $p->ctecue_ide ?>"
						>
						<?php echo $p->ctecue_cuenta ?></option>
					<?php endforeach; ?>
				</select>
			</div>
		</div>		
		<div class="clearfix"></div>
		<div class="form-group col-sm-2">
			<label for="" class="label control-label col-sm-12 bolder">Frecuencia de Cuotas:</label>
			<div class="col-sm-12" id="ser">
				<select class="form-control chosen" name="fre" id="fre">
					<option value="1" selected>Dias</option>
					<option value="2">Semanal</option>
					<option value="3">Quincenal</option>
					<option value="4">Mensual</option>
				</select>
			</div>
		</div>
		<div class="form-group col-sm-2">
			<label for="" class="label control-label col-sm-12 bolder">Cobrar cada cuantos Dias:</label>
			<div class="col-sm-12">
				<input type="number" min="0" name="dias" class="form-control" value ="">
			</div>
		</div>
		
		<div class="form-group col-sm-2">
			<label for="" class="label control-label col-sm-12 bolder">Cantidad de Artículos:</label>
			<div class="col-sm-12">
				<input type="number" min="0" name="can" class="form-control" value="">
			</div>
		</div>


		<div class="form-group col-sm-2">
			<label for="" class="label control-label col-sm-12 bolder">Monto Total</label>
			<div class="col-sm-12">
				<input type="number" min="0" name="sdo" class="form-control" value="">
			</div>
		</div>

		<div class="clearfix"></div>

		<div class="form-group col-sm-6">
			<label for="" class="label control-label col-sm-12 bolder">Descripción de Artículos:</label>
			<div class="col-sm-12">
				<input type="text"  name="observ" class="form-control" value="">
			</div>
		</div>
		<div class="form-group col-sm-2">
			<label for="" class="label control-label col-sm-12 bolder">Modalidad:</label>
			<div class="col-sm-12" id="tp_mod">
				<select class="form-control chosen" name="tp_mod" id="tp_mod">
					<option value="0" selected>Banco</option>
					<option value="1">Tienda</option>
				</select>
			</div>
		</div>		

		<div class="clearfix"></div>

		<!-- Botón de acción ###########-->
		<div class="clearfix"></div>
		<div class="form-actions clearfix">
			<button class="btn btn-primary btn-sm pull-right"><span class="i fa fa-check"></span> Guardar Contrato</button>
		</div>
	</fieldset>
</form>
<script>
	$(function(){
		$('.chosen').chosen();

		$( ".fecha" ).datepicker({
			autoclose:true
	    }).next().on(ace.click_event, function(){
			 $(this).prev().focus();
		});

	})
</script>

<script>
	$(function(){
		var formulario = '.datosconsulta';
		$(formulario).validate({
			errorElement: 'div',
			errorClass: 'help-block',
			focusInvalid: true,
			rules: {
				fec: {
					required: true,
				},
				fec_ini_cob: {
					required: true,
				},		
				mone: {
					required: true,
				},	
				cuenta_ide: {
					required: true,
				},	
				can: {
					required: true,
				},
				mto: {
					required: true,
				},
				cuo: {
					required: true,
				},	
				cuenta_ide: {
					required: true,					
				},
				fre: {
					required: true,
				}
			},

			messages: {
				fec: {
					required: 'Obligatorio',
					},
				fec_ini_cob: {
					required: 'Obligatorio',
					},	
				mone: {
					required: 'Obligatorio',
					},				
				cuenta_ide: {
					required: 'Obligatorio',
					},											
				can: {
					required: 'Obligatorio',
					},
				mto: {
					required: 'Obligatorio',
					},
				cuo: {
					required: 'Obligatorio',
					},
				cuenta_ide: {
					required: 'Obligatorio',
					},					
				fre: {
					required: 'Obligatorio',
				}
			},

			invalidHandler: function (event, validator) { //display error alert on form submit   
				$('.alert-danger', $(formulario)).show();
			},

			highlight: function (e) {
				$(e).closest('.form-group').removeClass('has-info').addClass('has-error');
			},

			success: function (e) {
				$(e).closest('.form-group').removeClass('has-error').addClass('has-info');
				$(e).remove();
			},

			submitHandler: function (form) {
				var vcuenta = $('select[name="cuenta_ide"]').val();

				if (vcuenta=="") {
					/*alerta('.msj','danger','Seleccione Cuenta');*/
					alert('Seleccione Cuenta Bancaria');
				} else {
					$.post('prc-mcontrato-insert',$(formulario).serialize(),function(data){
						if(!isNaN(data)) {
							load('vst-contrato-listaContratos','clien_ide=<?php echo $clien_ide; ?>','.listaContratos');
							if(confirm('Registro agregado correctamente.\n¿Desea agregar otro registro?')==true) {
								$(formulario).each(function(){ this.reset() })
							} else {
								cerrarmodal();
							}
						} else {
							alerta('.msj','danger',data)
						}
					})
				}
			},
			
			invalidHandler: function (form) {
			}
		});
	})
</script>