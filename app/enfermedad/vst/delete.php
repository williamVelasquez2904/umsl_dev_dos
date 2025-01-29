<?php require '../../../cfg/base.php'; 
$rowenf=$menfermedad->poride($ide);
?>
<form action="" class="op3 form-horizontal">
	<?php echo $fn->modalHeader('Eliminar Enfermedad') ?>
	<div class="modal-body">
		<div class="alert alert-danger">¿Realmente desea borrar la enfermedad seleccionada?<br><small><strong>Nota:</strong> Ésta operación eliminará todo los registros asociados a la enfermedad</small></div>
		<div class="msj"></div>
		<div class="form-group">
			<label for="" class="control-label col-sm-3 bolder">Enfermedad:</label>
			<div class="col-sm-9">
				<input type="text" class="form-control" name="des" value="<?php echo $rowenf[0]->enf_descrip; ?>" disabled>
			</div>
		</div>
		<div class="form-group">
			<label for="" class="control-label col-sm-6 bolder">¿Amerita Notificar a INPSASEL?:</label>
			<div class="col-sm-6">
				<?php echo $rowenf[0]->enf_noti_inpsasel_desc; ?>
			</div>
		</div>
		<div class="form-group">
			<label for="" class="control-label col-sm-6 bolder">¿Amerita Certificar Discapacidad?:</label>
			<div class="col-sm-6">
				<?php echo $rowenf[0]->enf_certi_discapacidad_desc; ?>
			</div>
		</div>
	</div>
	<input type="hidden" name="ide" value="<?php echo $ide; ?>">
	<?php echo $fn->modalFooter(1) ?>
</form>
<script>
	$(function(){
		var formulario = '.op3';
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
				if(confirm('¿Realmente desea borrar este regisro de enfermedad?.\n')==true) {
					$.post('prc-menfermedad-delete',$(formulario).serialize(),function(data){
						if(!isNaN(data)) {
							load('vst-enfermedad-lista','','.lista');
							cerrarmodal();
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