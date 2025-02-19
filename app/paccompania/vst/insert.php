<?php require '../../../cfg/base.php'; 
extract($_POST);
?>
<form action="" class="opEmpresaPaciente form-horizontal">
	<?php echo $fn->modalHeader('Agregar Empresa Vinculada a Empleado') ?>
	<div class="modal-body">
		<div class="msj"></div>


		<div class="form-group">
			<label for="" class="label control-label col-sm-3 bolder">Empresa</label>
			<div class="col-sm-9" id="banco_ide">
				<select class="form-control chosen" title="Empresa" name="cia_ide" id="cia_ide">
					<option value=""></option>
					<?php foreach($mcompania->lista() as $c): ?>
						<option value="<?php echo $c->compania_ide ?>"><?php echo $c->compania_nombre ?></option>
					<?php endforeach; ?>
				</select>
			</div>
		</div>

		<div class="form-group">
			<label for="" class="label control-label col-sm-3 bolder">Cargo</label>
			<div class="col-sm-9" id="cargo_ide">
				<select class="form-control chosen" title="Cargo" name="cargo_ide" id="cargo_ide">
					<option value=""></option>
					<?php foreach($mcargo->lista() as $c): ?>
						<option value="<?php echo $c->cargo_ide ?>"><?php echo $c->cargo_descrip ?></option>
					<?php endforeach; ?>
				</select>
			</div>
		</div>
		<input type="hidden" class="form-control" name="pac_ide" value="<?php echo $pac_ide ?>">
	</div>
	<?php echo $fn->modalFooter(1) ?>
</form>
<script>
	$(function(){
		var formulario = '.opEmpresaPaciente';
		$(formulario).validate({
			errorElement: 'div',
			errorClass: 'help-block',
			focusInvalid: true,
			rules: {
				cta: {
					required: true,
				}
			},

			messages: {
				cta: {
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
				$.post('prc-mpaccompania-insert',$(formulario).serialize(),function(data){
					if(!isNaN(data)) {
						load('vst-paccompania-lista','pac_ide='+data,'.companias');

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