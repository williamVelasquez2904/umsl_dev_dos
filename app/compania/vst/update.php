<?php require '../../../cfg/base.php'; ?>
<?php foreach($mcompania->poride($ide) as $r): ?>
	<form action="" class="op2 form-horizontal">
		<?php echo $fn->modalHeader('Editar Empresa') ?>
		<div class="modal-body">
			<div class="msj"></div>
			<div class="form-group">
				<label for="" class="control-label col-sm-4 bolder">R.I.F.:</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" name="rif" value="<?php echo $r->compania_rif ?>">
				</div>
			</div>
			<div class="form-group">
				<label for="" class="control-label col-sm-4 bolder">Razón Social:</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" name="nom" value="<?php echo $r->compania_nombre ?>">
				</div>
			</div>
			<div class="form-group">
				<label for="" class="control-label col-sm-4 bolder">Dirección:</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" name="dir" value="<?php echo $r->compania_direccion ?>">
				</div>
			</div>
			<div class="form-group">
				<label for="" class="control-label col-sm-4 bolder">Telefono:</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" name="tel" value="<?php echo $r->compania_telefono ?>">
				</div>
			</div>
			<div class="form-group">
				<label for="" class="control-label col-sm-4 bolder">Email:</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" name="cor" value="<?php echo $r->compania_email ?>">
				</div>
			</div>


		</div>
		<?php echo $fn->modalFooter(1) ?>
		<input type="hidden" class="form-control" name="ide" value="<?php echo $r->compania_ide ?>">
	</form>
<?php endforeach; ?>
<script>
	$(function(){
		var formulario = '.op2';
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
				$.post('prc-mcompania-update',$(formulario).serialize(),function(data){
					if(!isNaN(data)) {
						load('vst-compania-lista','','.lista');
						alerta('.msj','success','Registro modificado correctamente');
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