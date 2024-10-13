<?php require '../../../cfg/base.php'; ?>
<?php foreach($musuarios->poride($usua_ide) as $r): ?>
	<form action="" class="op2-pac well">
		<div class="msj-pac"></div>
		<fieldset><legend>Datos Personales (Actualización de Usuario)</legend>	
			<div class="form-group col-sm-3">
				<label for="" class="label control-label col-sm-12 bolder">Tipo: </label>
				<div class="col-sm-10" id="tipcli">
					<select class="form-control chosen" title="Tipo de Persona" name="tipcli" id="tipcli" onchange="load('vst-tipclien-select','tipcli_ide='+this.value,'#tipcli');">
						<option value=""></option>
						<?php foreach($mtipclien->lista() as $p): ?>
							<option value="<?php echo $p->tipcli_ide ?>" <?php echo $fn->select($p->tipcli_ide,$r->usua_tipo) ?>><?php echo $p->tipcli_descrip ?></option>
						<?php endforeach; ?>
					</select>
				</div>
			</div>
			<div class="form-group col-sm-3">
				<label for="" class="label control-label col-sm-12 bolder">Cedula:</label>
				<div class="col-sm-12">
					<input type="text" name="ced" class="form-control" value="<?php echo $r->usua_numiden ?>">
				</div>
			</div>
			<div class="form-group col-sm-3">
				<label for="" class="label control-label col-sm-12 bolder">Apellido:</label>
				<div class="col-sm-12">
					<input type="text" name="ape1" class="form-control" value="<?php echo $r->usua_apelli ?>">
				</div>
			</div>
			<div class="form-group col-sm-3">
				<label for="" class="label control-label col-sm-12 bolder">Nombre:</label>
				<div class="col-sm-12">
					<input type="text" name="nom1" class="form-control" value="<?php echo $r->usua_nombre ?>">
				</div>
			</div>
			<div class="clearfix"></div>
			<div class="form-group col-sm-12">
				<label for="" class="label control-label col-sm-12 bolder">Dirección:</label>
				<div class="col-sm-12">
					<input type="text" name="dir" class="form-control" value="<?php echo $r->usua_direcci ?>">
				</div>
			</div>
			<div class="clearfix"></div>
			<div class="form-group col-sm-3">
				<label for="" class="label control-label col-sm-12 bolder">Teléfono Móvil:</label>
				<div class="col-sm-12">
					<input type="text" name="mov" class="form-control" value="<?php echo $r->usua_telmovi ?>">
				</div>
			</div>
			<div class="form-group col-sm-3">
				<label for="" class="label control-label col-sm-12 bolder">Fecha de Nacimiento:</label>
				<div class="col-sm-12">
					<input type="text" name="fnac" class="form-control fecha" value="<?php echo date('d-m-Y',strtotime($r->usua_fecnaci)); ?>">
				</div>
			</div>
			<div class="form-group col-sm-3">
				<label for="" class="label control-label col-sm-12 bolder">Tipo:</label>
				<div class="col-sm-12">
					<select name="tipo" id="tipo" class="form-control chosen">
						<?php foreach($mtipousua->lista() as $ra): ?>
							<option value="<?php echo $ra->tius_ide ?>" <?php echo $fn->select($ra->tius_ide,$r->usua_tius) ?>><?php echo $ra->tius_descrip ?></option>
						<?php endforeach; ?>
					</select>
				</div>
			</div>

		<div class="form-group col-sm-3">
			<label for="" class="label control-label col-sm-12 bolder">Aplica para la tienda:</label>
			<div class="col-sm-12" id="tienda">
				<select class="form-control chosen" title="Tienda" name="tie" id="tie">
					<?php foreach($mtienda->lista() as $t): ?>
						<option value="<?php echo $t->empresa_ide; ?>" <?php echo $fn->select($t->empresa_ide,$r->usua_tienda) ?>><?php echo $t->empresa_nombre; ?></option>
					<?php endforeach; ?>
				</select>
			</div>
		</div>

			<div class="clearfix"></div>

			<div class="form-group col-sm-3">
				<label for="" class="label control-label col-sm-12 bolder">Correo Electrónico:</label>
				<div class="col-sm-12">
					<input type="text" name="corre" class="form-control" value="<?php echo $r->usua_correo ?>">
				</div>
			</div>

			<div class="form-group col-sm-3">
				<label for="" class="label control-label col-sm-12 bolder">Login:</label>
				<div class="col-sm-12">
					<input type="text" name="login" class="form-control" value="<?php echo $r->usua_login ?>">
				</div>
			</div>

			<div class="form-group col-sm-3">
				<label for="" class="label control-label col-sm-12 bolder">Clave:</label>
				<div class="col-sm-12">
					<input type="password" name="clave" id="clave" class="form-control" value="">
				</div>
			</div>

			<div class="form-group col-sm-3">
				<label for="" class="label control-label col-sm-12 bolder">Confirme Clave:</label>
				<div class="col-sm-12">
					<input type="password" name="clave2" class="form-control" value="">
				</div>
			</div>

			<div class="clearfix"></div>
			<div class="form-actions">
				<div class="btn-group pull-right">
					<button class="btn btn-primary btn-sm"><span class="i fa fa-check"></span> Guardar Cambios</button>
					<button type="button" class="btn btn-danger btn-sm pull-right" onclick="location.reload()"><span class="i fa fa-times"></span> Cancelar / Volver</button>
				</div>
			</div>
		</fieldset>
		<input type="hidden" name="usua_ide" value="<?php echo $r->usua_ide ?>">
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
				nom1: {
					required: true,
				},
				ape1: {
					required: true,
				},
				dir: {
					required: true,
				},
				mov: {
					required: true,
					number: true,
				},
				fnac: {
					required: true,
				},
				corre: {
					email: true,
				},
				login: {
					required: true,
				},
				clave: {
					required: true,
				},
				clave2: {
					required: true,
					equalTo: '#clave',
				}
			},

			messages: {
				ced: {
					required: 'Obligatorio',
				},
				nom1: {
					required: 'Obligatorio',
				},
				ape1: {
					required: 'Obligatorio',
				},
				dir: {
					required: 'Obligatorio',
				},
				mov: {
					required: 'Obligatorio',
					number: 'Numérico',
				},
				fnac: {
					required: 'Obligatorio',
				},
				corre: {
					email: 'Correo no válido',
				},
				login: {
					required: 'Obligatorio',
				},
				clave: {
					required: 'Obligatorio',
				},
				clave2: {
					required: 'Obligatorio',
					equalTo: 'Las claves no coinciden',
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
				$.post('prc-cusuarios-cupdate',$(formulario).serialize(),function(data){
					if(!isNaN(data)) {
						alert('Cambios guardados correctamente');
						load('vst-usuarios-update','usua_ide=<?php echo $usua_ide ?>','.lista');
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