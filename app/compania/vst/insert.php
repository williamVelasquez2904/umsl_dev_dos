<?php require '../../../cfg/base.php'; ?>
<form action="" class="op1 form-horizontal">
	<?php echo $fn->modalHeader('Agregar Empresa') ?>
	<div class="modal-body">
		<div class="msj"></div>
		<div class="form-group">
			<label for="" class="control-label col-sm-4 bolder">R.I.F.:</label>
			<div class="col-sm-8">
				<input type="text" class="form-control" name="rif">
			</div>
		</div>
		<div class="form-group">
			<label for="" class="control-label col-sm-4 bolder">Razón Social:</label>
			<div class="col-sm-8">
				<input type="text" class="form-control" name="nom">
			</div>
		</div>
		<div class="form-group">
			<label for="" class="control-label col-sm-4 bolder">Dirección:</label>
			<div class="col-sm-8">
				<input type="text" class="form-control" name="dir">
			</div>
		</div>
		<div class="form-group">
			<label for="" class="control-label col-sm-4 bolder">Telefono:</label>
			<div class="col-sm-8">
				<input type="text" class="form-control" name="tel">
			</div>
		</div>
		<div class="form-group">
			<label for="" class="control-label col-sm-4 bolder">Email:</label>
			<div class="col-sm-8">
				<input type="email" class="form-control" name="cor">
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
				rif: {
					required: true,
				}
			},

			messages: {
				rif: {
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
				$.post('prc-mcompania-insert',$(formulario).serialize(),function(data){
					if(!isNaN(data)) {
						load('vst-compania-lista','','.lista');
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