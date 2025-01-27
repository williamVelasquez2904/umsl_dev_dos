<?php require '../../../cfg/base.php'; 
extract($_POST);
//se busca la Cantidad de consultas  del paciente
$row=$mconsulta->porpac_ide($pac_ide);
//var_dump($row);

?>
<div id="mensaje"></div> 
<!-- <div class="">
	<label for="" class="label control-label col-sm-12 bolder">Datos de la Consulta</label>
</div> -->
<div>
<div class="alert alert-info">
	<i class="fa fa-exclamation-triangle fa-3x pull-left red"></i>[insertconsulta]. 27-01-2025  Por favor rellene el siguiente formulario para agregar consulta.
</div>
<form action="" class="datosconsulta">
	<div class="msj-errores" id="errores_contrato"></div>
	
	<fieldset><legend>Datos de la Consulta</legend>	

		<input type="hidden" name="pac_ide" class="form-control" value="<?php echo $pac_ide; ?>"> 
<!--		
		<div class="form-group col-sm-3">
 			<label for="" class="label control-label col-sm-12 bolder">Empresa</label>
			<div class="col-sm-12" id="tienda">
				<select class="form-control chosen" title="Empresa" name="emp" id="emp">
					<option value=""></option>
					<?php //foreach($mcompania->lista() as $c): ?>
						<option value="<?php //echo $c->compania_ide; ?>">
					<?php //echo $c->compania_ide." - ".$c->compania_nombre; ?></option>
					<?php //endforeach; ?>
				</select>
			</div>
		</div> -->
		<div class="form-group col-sm-8">
			<label for="" class="label control-label col-sm-12 bolder">Empresa / Informe Epid.</label>
			<div class="col-sm-12" >
				<select class="form-control chosen" title="Empresa" name="emp" id="emp">
					<option value=""></option>
					<?php foreach($minforepi->lista() as $i): ?>
						<option value="<?php echo $i->inforepi_ide; ?>">
					<?php echo $i->inforepi_descripcion." - ".$i->compania_nombre." | ".date_format(date_create($i->inforepi_fecha_desde), 'd-m-Y')." | ".date_format(date_create($i->inforepi_fecha_hasta), 'd-m-Y') ; ?>
				
						
					</option>
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
			<label for="" class="label control-label col-sm-12 bolder">Motivo</label>
			<div class="col-sm-12" id="mot">
				<select class="form-control chosen" title="Moneda" name="mot" id="mot" >
					<?php foreach($mmotivo->lista() as $m): ?>
						<option value="<?php echo $m->motivo_ide ?>">
							<?php echo $m->motivo_ide.'-'. $m->motivo_descrip ?></option>
					<?php endforeach; ?>
				</select>
			</div>
		</div>		

		<div class="clearfix"></div>

		<!--
		<div class="form-group col-sm-4">
			<label for="" class="label control-label col-sm-12 bolder">Empresa</label>
			<div class="col-sm-12" id="cuenta_ide">
				<select class="form-control chosen" title="Empresa" name="empre" id="cuenta_ide" >
					<option value=""></option>
					<?php //foreach($mpaciente_empresa->empresas_por_pac_ide($pac_ide) as $p): ?>
						<option value="<?php //echo $p->pacemp_emp_ide ?>"
						>
						<?php //echo $p->pacemp_empresa ?></option>
					<?php //endforeach; ?>
				</select>
			</div>
		</div>		-->
		<div class="clearfix"></div>


		<div class="form-group col-sm-2">
			<label for="" class="label control-label col-sm-12 bolder">Resultado de la Consulta:</label>
			<div class="col-sm-12" id="resul">
				<select class="form-control chosen" name="resul" id="resul" disabled>
					<option value="0" selected>Por Asignar</option>
					<option value="1">Apto</option>
					<option value="2">Apto con limitación</option>
					<option value="3">No Apto</option>
				</select>
			</div>
		</div>		

		<div class="clearfix"></div>

		<!-- Botón de acción ###########-->
		<div class="clearfix"></div>
		<div class="form-actions clearfix">
			<button class="btn btn-primary btn-sm pull-right"><span class="i fa fa-check"></span> Guardar </button>
		</div>
	</fieldset>
</form>
</div>
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
				emp: {
					required: true,
				},				
				mot: {
					required: true,
				}
			},

			messages: {
				fec: {
					required: 'Obligatorio',
					},
				emp: {
					required: 'Obligatorio',
					},
				mot: {
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

					$.post('prc-mconsulta-insert',$(formulario).serialize(),function(data){
						if(!isNaN(data)) {
							load('vst-consulta-listaConsultas','pac_ide=<?php echo $pac_ide; ?>','.lista');
							if(confirm('Registro agregado correctamente.\n¿Desea agregar otro registro?')==true) {
								$(formulario).each(function(){ this.reset() })
							} else {
								cerrarmodal();
							}
						} else {
							alerta('.msj','danger',data)
						}
					})

			},
			
			invalidHandler: function (form) {
			}
		});
	})
</script>