<?php require '../../../cfg/base.php'; ?>
<?php foreach($mcliente->poride($clien_ide) as $r): ?>
	<form action="" class="op2-pac well">
		<div class="msj-pac"></div>
		<fieldset><legend>Datos</legend>	
			<div class="form-group col-sm-4">
				<label for="" class="label control-label col-sm-12 bolder">Código:</label>
				<div class="col-sm-12">
					<input type="text" name="cod" class="form-control" value="<?php echo $r->clien_codigo ?>">
				</div>
			</div>
			<div class="form-group col-sm-4">
				<label for="" class="label control-label col-sm-12 bolder">Tipo: </label>
				<div class="col-sm-10" id="tipcli">
					<select class="form-control chosen" title="Agregar" name="tipcli" id="tipcli" onchange="load('vst-tipclien-select','tipcli_ide='+this.value,'#tipcli');">
						<option value=""></option>
						<?php foreach($mtipclien->lista() as $p): ?>
							<option value="<?php echo $p->tipcli_ide ?>" <?php echo $fn->select($p->tipcli_ide,$r->clien_tipcli) ?>><?php echo $p->tipcli_descrip ?></option>
						<?php endforeach; ?>
					</select>
				</div>
			</div>
			<div class="form-group col-sm-4">
				<label for="" class="label control-label col-sm-12 bolder">Cedula:</label>
				<div class="col-sm-12">
					<input type="text" name="ced" class="form-control" value="<?php echo $r->clien_numiden ?>">
				</div>
			</div>
			<div class="clearfix"></div>
			<div class="form-group col-sm-4">
				<label for="" class="label control-label col-sm-12 bolder">Razón Social o Nombre:</label>
				<div class="col-sm-12">
					<input type="text" name="nom1" class="form-control" value="<?php echo $r->clien_nombre1 ?>">
				</div>
			</div>
			<div class="form-group col-sm-4">
				<label for="" class="label control-label col-sm-12 bolder">Alias:</label>
				<div class="col-sm-12">
					<input type="text" name="nom2" class="form-control" value="<?php echo $r->clien_nombre1 ?>">
				</div>
			</div>
			<div class="form-group col-sm-4">
				<label for="" class="label control-label col-sm-12 bolder">Fecha de Nacimiento:</label>
				<div class="col-sm-12">
					<input type="text" name="fnac" class="form-control fecha" value="<?php echo date('d-m-Y',strtotime($r->clien_fecnaci)); ?>">
				</div>
			</div>
			<div class="clearfix"></div>
			<div class="form-group col-sm-12">
				<label for="" class="label control-label col-sm-12 bolder">Dirección:</label>
				<div class="col-sm-12">
					<input type="text" name="dir" class="form-control" value="<?php echo $r->clien_direcci ?>">
				</div>
			</div>
			<div class="clearfix"></div>
			<div class="form-group col-sm-4">
				<label for="" class="label control-label col-sm-12 bolder">Teléfono Móvil:</label>
				<div class="col-sm-12">
					<input type="text" name="mov" class="form-control" value="<?php echo $r->clien_telmovi ?>">
				</div>
			</div>
			<div class="form-group col-sm-4">
				<label for="" class="label control-label col-sm-12 bolder">Correo Electrónico:</label>
				<div class="col-sm-12">
					<input type="text" name="corre" class="form-control" value="<?php echo $r->clien_correo ?>">
				</div>
			</div>
			<div class="form-group col-sm-4">
				<label for="" class="label control-label col-sm-12 bolder">Contribuyente Especial:</label>
				<select class="form-control chosen" name="coes" id="coes">
					<option <?php if ($r->clien_contriespec==0) echo 'selected="true"'; ?> value="0">No</option>
					<option <?php if ($r->clien_contriespec==1) echo 'selected="true"'; ?> value="1">Si</option>
				</select>
			</div>
			<div class="clearfix"></div>
			<div class="form-group col-sm-6">
				<label for="" class="label control-label col-sm-12 bolder">Vendedor:</label>
				<div class="col-sm-12" id="vende">
					<select class="form-control chosen" name="vende" id="vende">
						<option value=""></option>
						<?php foreach($mvendedor->lista() as $v): ?>
							<option value="<?php echo $v->vende_ide ?>" <?php echo $fn->select($v->vende_ide,$r->clien_vendedor) ?>><?php echo $v->vende_razonsocial ?> (<?php echo $v->vende_alias ?>)</option>
						<?php endforeach; ?>
					</select>
				</div>
			</div>
			<div class="form-group col-sm-6">
				<label for="" class="label control-label col-sm-12 bolder">Zona:</label>
				<div class="col-sm-12" id="zona">
					<select class="form-control chosen" name="zona" id="zona">
						<option value=""></option>
						<?php foreach($mzona->lista() as $z): ?>
							<option value="<?php echo $z->zona_ide ?>" <?php echo $fn->select($z->zona_ide,$r->clien_zona) ?>><?php echo $z->zona_descrip ?></option>
						<?php endforeach; ?>
					</select>
				</div>
			</div>
			<div class="clearfix"></div>
			<div class="form-group col-sm-12">
				<label for="" class="label control-label col-sm-12 bolder">Ubicación Mapa:</label>
				<div class="col-sm-12">
					<input type="text" name="ubimap" class="form-control" value="<?php echo $r->clien_ubimap ?>">
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
		<input type="hidden" name="clien_ide" value="<?php echo $r->clien_ide ?>">
		<input type="hidden" name="ape1" class="form-control" value="<?php echo $r->clien_apelli1 ?>">
		<input type="hidden" name="ape2" class="form-control" value="<?php echo $r->clien_apelli2 ?>">
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
				cod: {
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
				cod: {
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
				$.post('prc-mcliente-update',$(formulario).serialize(),function(data){
					if(!isNaN(data)) {
						alert('Cambios guardados correctamente');
						load('vst-cliente-datos.personales','clien_ide=<?php echo $clien_ide ?>','.perfil');
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