<?php require '../../../cfg/base.php'; 
$rowenf=$menfermedad->poride($ide);
?>
<form action="" class="op2 form-horizontal">
	<?php echo $fn->modalHeader('Modificar Enfermedad') ?>
	<div class="modal-body">
		<div class="msj"></div>
		<div class="form-group">
			<label for="" class="control-label col-sm-3 bolder">Enfermedad:</label>
			<div class="col-sm-9">
				<input type="text" class="form-control" name="des" value="<?php echo $rowenf[0]->enf_descrip; ?>">
			</div>
		</div>
		<div class="form-group">
			<label for="" class="control-label col-sm-6 bolder">¿Amerita Notificar a INPSASEL?:</label>
			<div class="col-sm-6">
				<select name="noti" id="noti" class="form-control chosen" title="Notificar">
					<option value="0" <?php if($rowenf[0]->enf_noti_inpsasel==0) { echo "selected"; } ?>>NO</option>
					<option value="1" <?php if($rowenf[0]->enf_noti_inpsasel==1) { echo "selected"; } ?>>SI</option>
				</select>
			</div>
		</div>
		<div class="form-group">
			<label for="" class="control-label col-sm-6 bolder">¿Amerita Certificar Discapacidad?:</label>
			<div class="col-sm-6">
				<select name="cert" id="cert" class="form-control chosen" title="Certificar">
					<option value="0" <?php if($rowenf[0]->enf_certi_discapacidad==0) { echo "selected"; } ?>>NO</option>
					<option value="1" <?php if($rowenf[0]->enf_certi_discapacidad==1) { echo "selected"; } ?>>SI</option>
				</select>
			</div>
		</div>
	</div>
	<input type="hidden" name="ide" value="<?php echo $ide; ?>">
	<?php echo $fn->modalFooter(1) ?>
</form>
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
				$.post('prc-menfermedad-update',$(formulario).serialize(),function(data){
					if(!isNaN(data)) {
						load('vst-enfermedad-lista','','.lista');
						cerrarmodal();
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