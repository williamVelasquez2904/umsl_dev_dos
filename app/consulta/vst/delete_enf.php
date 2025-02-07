<?php require '../../../cfg/base.php'; 
foreach($mconsulta->poride_enf($ide) as $r): ?>
	<form action="" class="op3 form-horizontal">
		<?php echo $fn->modalHeader('Borrar Enfermedad en consulta') ?>
		<div class="modal-body">
			<div class="alert alert-danger">¿Realmente desea borrar el registro seleccionado?</div>
			<div class="msj"></div>
			<div class="form-group">
				<label for="" class="control-label col-sm-4 bolder">Enfermedad:</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" name="enf" value="<?php echo $r->enf_descrip ?>" disabled>
				</div>
			</div>

		</div>
		<?php echo $fn->modalFooter(1) ?>
		<input type="hidden" class="form-control" name="ide" value="<?php echo $r->consenf_ide ?>">
	</form>
<?php endforeach; ?>
<script>
	$(function(){
		var formulario = '.op3';
		$(formulario).validate({
			errorElement: 'div',
			errorClass: 'help-block',
			focusInvalid: true,
			rules: {
				
			},

			messages: {
				
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
				$.post('prc-mconsulta-delete_enfer',$(formulario).serialize(),function(data){
					if(data==1) {
						load('vst-consulta-lista_enfer','ide=<?php echo $ide; ?>','.lista_enf');
					
						alert('Registro eliminado correctamente');
						cerrarmodal();
					} else {
						alerta('.msj','danger','Imposible eliminar. Existe una restricción de clave foránea')
					}
				})
			},
			invalidHandler: function (form) {
			}
		});
	})
</script>