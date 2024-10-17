<?php require '../../../cfg/base.php'; ?>
<?php foreach($mpatient->poride($pac_ide) as $r): ?>
	<form action="" class="op2-pac well">
		<div class="msj-pac"></div>
		<fieldset><legend>Datos del Paciente</legend>	


			<div class="form-group col-sm-4">
				<label for="" class="label control-label col-sm-12 bolder">Cédula:</label>
				<div class="col-sm-12">
					<input type="text" name="ced" class="form-control" value="<?php echo $r->pac_numiden ?>">
				</div>
			</div>

			<div class="form-group col-sm-4">
				<label for="" class="label control-label col-sm-12 bolder">Nombre:</label>
				<div class="col-sm-12">
					<input type="text" name="nom" class="form-control" value="<?php echo $r->pac_nombre ?>">
				</div>
			</div>

			<div class="form-group col-sm-4">
				<label for="" class="label control-label col-sm-12 bolder">Apellido:</label>
				<div class="col-sm-12">
					<input type="text" name="ape" class="form-control" value="<?php echo $r->pac_apellido ?>">
				</div>
			</div>

			<div class="form-group col-sm-2">
				<label for="" class="label control-label col-sm-12 bolder">Fecha de Nacimiento:</label>
				<div class="col-sm-12">
					<input type="text" name="fnac" class="form-control fecha" value="<?php echo date('d-m-Y',strtotime($r->pac_fecnac)); ?>">
				</div>
			</div>
			<div class="form-group col-sm-2">
				<label for="" class="label control-label col-sm-12 bolder">Sexo:</label>
				<div class="col-sm-12">
						<select class="form-control chosen" name="sexo" id="sexo">
							<option value=1>Masculino</option>
							<option value=2>FEmenino</option>
						</select>
				</div>
			</div>
								
			<div class="clearfix"></div>


			<div class="form-actions">
				<div class="btn-group pull-right">
					<button class="btn btn-primary btn-sm"><span class="i fa fa-check"></span> Guardar Cambios</button>
					<button type="button" class="btn btn-danger btn-sm pull-right" onclick="load('vst-cliente-datos.personales','clien_ide=<?php echo $clien_ide ?>','.perfil')"><span class="i fa fa-times"></span> Cancelar</button>
				</div>
			</div>
		</fieldset>
		<input type="hidden" name="pac_ide" value="<?php echo $r->pac_ide ?>">
		<input type="hidden" name="ape1" class="form-control" value="<?php echo $r->pac_apellido ?>">

	</form>
<?php endforeach; ?>
<script>
	$(function(){
		$('.chosen').chosen();
		$('.fecha').datepicker({format:'dd-mm-yyyy',endDate:'-18y'});
	})
</script>

<script>
	$(function(){
		var formulario = '.op2-pac';
		$(formulario).validate({
			errorElement: 'div',
			errorClass: 'help-block',
			focusInvalid: true,
			rules: {
				ced: {
					required: true,
				},
				nom: {
					required: true,
				},
				ape: {
					required: true,
				},				
				fnac: {
					required: true,
				}
			},

			messages: {
				ced: {
					required: 'Obligatorio',
				},
				nom: {
					required: 'Obligatorio',
				},
				ape: {
					required: 'Obligatorio',
				},
				fnac: {
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
				$.post('prc-mpatient-update',$(formulario).serialize(),function(data){
					if(!isNaN(data)) {
						alert('Cambios guardados correctamente');
						load('vst-patient-datos.personales','pac_ide=<?php echo $pac_ide ?>','.perfil');
					} else {
						alerta('.msj-pac','danger',data)
					}
				})
			},
			invalidHandler: function (form) {
			}
		});
	})
</script>