<?php require '../../../cfg/base.php'; ?>
<form action="" class="op1 form-horizontal">
	<?php echo $fn->modalHeader('Agregar Enfermedad') ?>
	<div class="modal-body">
		<div class="msj"></div>
		<div class="form-group">
			<label for="" class="control-label col-sm-3 bolder">Enfermedad:</label>
			<div class="col-sm-9">
				<input type="text" class="form-control" name="des">
			</div>
		</div>
		<div class="form-group">
			<label for="" class="control-label col-sm-6 bolder">¿Amerita Notificar a INPSASEL?:</label>
			<div class="col-sm-6">
				<select name="noti" id="noti" class="form-control chosen" title="Notificar">
					<option value="0" selected>NO</option>
					<option value="1">SI</option>
				</select>
			</div>
		</div>
		<div class="form-group">
			<label for="" class="control-label col-sm-6 bolder">¿Amerita Certificar Discapacidad?:</label>
			<div class="col-sm-6">
				<select name="cert" id="cert" class="form-control chosen" title="Certificar">
					<option value="0" selected>NO</option>
					<option value="1">SI</option>
				</select>
			</div>
		</div>
	</div>
	<?php echo $fn->modalFooter(1) ?>
</form>
<script>
	$(function(){
		var formulario = '.op1';
		$(formulario).validate({
			errorElement: 'div',
			errorClass: 'help-block',
			focusInvalid: true,
			rules: {
				des: {
					required: true,
				}
			},

			messages: {
				des: {
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
				$.post('prc-menfermedad-insert',$(formulario).serialize(),function(data){
					if(!isNaN(data)) {
						load('vst-enfermedad-lista','','.lista');
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