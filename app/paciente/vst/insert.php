<?php require '../../../cfg/base.php'; ?>
<div class="alert alert-info">
	<i class="fa fa-exclamation-triangle fa-2x pull-left red"></i> Por favor rellene el siguiente formulario para agregar un Paciente.
</div>
<form action="" class="op1-clien">
	<div class="msj-clien" id="errores"></div>
	<!-- Datos del Paciente ############### -->
	<fieldset><legend>Datos</legend>	
		<div class="form-group col-sm-4">
			<label for="" class="label control-label col-sm-12 bolder">Cédula:</label>
			<div class="col-sm-12">
				<input type="text" name="cod" class="form-control">
			</div>
		</div>

		<div class="form-group col-sm-4">
			<label for="" class="label control-label col-sm-12 bolder">N° Identificación:</label>
			<div class="col-sm-12">
				<input type="text" name="ced" class="form-control">
			</div>
		</div>

		<div class="clearfix"></div>

		<div class="form-group col-sm-4">
			<label for="" class="label control-label col-sm-12 bolder">Nombre o Razón Social:</label>
			<div class="col-sm-12">
				<input type="text" name="nom1" class="form-control">
			</div>
		</div>

		<div class="form-group col-sm-4">
			<label for="" class="label control-label col-sm-12 bolder">Fecha Nacimiento:</label>
			<div class="col-sm-12">
				<input type="text" name="fnac" class="form-control fecha">
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="form-group col-sm-12">
			<label for="" class="label control-label col-sm-12 bolder">Dirección:</label>
			<div class="col-sm-12">
				<input type="text" name="dir" class="form-control">
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="form-group col-sm-4">
			<label for="" class="label control-label col-sm-12 bolder">Teléfono Móvil:</label>
			<div class="col-sm-12">
				<input type="text" name="mov" class="form-control">
			</div>
		</div>
		<div class="form-group col-sm-4">
			<label for="" class="label control-label col-sm-12 bolder">Correo Electrónico:</label>
			<div class="col-sm-12">
				<input type="email" name="corre" class="form-control">
			</div>
		</div>

		<div class="clearfix"></div>


			
<!-- Botón de acción ###########-->

<div class="clearfix"></div>

<div class="form-actions clearfix">
	<button class="btn btn-primary btn-sm pull-right"><span class="i fa fa-check"></span> Guardar Cambios</button>
</div>
	</fieldset>

</form>

<?php $mensacti='<button class="btn btn-success btn-xs" title="Activar" onclick=""><i class="fa fa-check"> Activar</i></button>'; ?>


<script>
	$(function(){
		$('.chosen').chosen();
		$('.fecha').datepicker({format:'dd-mm-yyyy',endDate:'-1d'});
	})
</script>

<script>
	$(function(){
		var formulario = '.op1-clien';
		$(formulario).validate({
			errorElement: 'div',
			errorClass: 'help-block',
			focusInvalid: true,
			rules: {
				tipcli: {
					required: true,
				},
				ced: {
					required: true,
				},
				nom1: {
					required: true,
				},
				dir: {
					required: true,
				}
			},

			messages: {
				tipcli: {
					required: 'Obligatorio',
				},
				ced: {
					required: 'Obligatorio',
				},
				nom1: {
					required: 'Obligatorio',
				},
				dir: {
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
				$.post('prc-mpaciente-insert',$(formulario).serialize(),function(data){
					if(!isNaN(data)) {
						load('vst-paciente-datos.personales','pac_ide='+data.trim(),'.perfil');
					} else {
						var data1=data.split(' - ');
						if (data1[0]=='PAciente se encuentra Inactivo') {
							
							

							if(confirm('Paciente se encuentra Inactivo, ¿Desea Reactivarlo?')==true) {
								$.post('prc-mcliente-reactivarlo','ide='+data1[1],function(data2){
									if(!isNaN(data2)) {
										alert('El cliente fue Reactivado satisfactoriamente')
										load('vst-cliente-datos.personales','clien_ide='+data1[1],'.perfil');
									} else {
										alerta('.msj-clien','danger',data2);
									}
								})
							}


						} else {
							alerta('.msj-clien','danger',data1[0]);
						}
						location.href="#errores"
					}
				})
			},
			invalidHandler: function (form) {
			}
		});
	})
</script>
<script>
	$(function(){
		var tag_input = $('#input_buscarcompania');
		if(! ( /msie\s*(8|7|6)/.test(navigator.userAgent.toLowerCase())) ) {
			tag_input.tag(
			  {
				placeholder:tag_input.attr('placeholder'),
				//enable typeahead by specifying the source array
				source: [<?php foreach($mcliente->lista() as $r): ?> "<?php echo $r->clien_ide.' - '.$r->clien_tipcli.$r->clien_numiden.' - '.$r->clien_apelli1.' '.$r->clien_apelli2.' '.$r->clien_nombre1.' '.$r->clien_nombre2; ?>", <?php endforeach; ?>]
			  }
			);
		}
		else {
			//display a textarea for old IE, because it doesn't support this plugin or another one I tried!
			tag_input.after('<textarea id="'+tag_input.attr('id')+'" name="'+tag_input.attr('name')+'" rows="3">'+tag_input.val()+'</textarea>').remove();
			//$('#form-field-tags').autosize({append: "\n"});
		}
	});
</script>