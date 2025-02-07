<?php require '../../../cfg/base.php'; 
foreach($mconsulta->poride($ide) as $r): ?>
	<form action="" class="op3 form-horizontal">
		<?php echo $fn->modalHeader('[delete.php] Borrar consulta') ?>
		<div class="modal-body">
			<div class="alert alert-danger">¿Realmente desea borrar el registro seleccionado?</div>
			<div class="msj"></div>
			<div class="form-group">
				<label for="" class="control-label col-sm-4 bolder">RIF:</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" name="rif" value="<?php echo $r->compania_rif ?>" disabled>
				</div>
			</div>
			<div class="form-group">
				<label for="" class="control-label col-sm-4 bolder">Razón Social:</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" name="nom" value="<?php echo $r->compania_nombre ?>" disabled>
				</div>
			</div>
			<div class="form-group">
				<label for="" class="control-label col-sm-4 bolder">Nombre alternativo:</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" name="nom2" value="<?php echo $r->compania_nombre2 ?>" disabled>
				</div>
			</div>
			<div class="form-group">
				<label for="" class="control-label col-sm-4 bolder">Dirección:</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" name="dir" value="<?php echo $r->compania_direccion ?>" disabled>
				</div>
			</div>
			<div class="form-group">
				<label for="" class="control-label col-sm-4 bolder">Telefono:</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" name="tel" value="<?php echo $r->compania_telefono ?>" disabled>
				</div>
			</div>
			<div class="form-group">
				<label for="" class="control-label col-sm-4 bolder">Email:</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" name="cor" value="<?php echo $r->compania_email ?>" disabled>
				</div>
			</div>
		</div>
		<?php echo $fn->modalFooter(1) ?>
		<input type="hidden" class="form-control" name="ide" value="<?php echo $r->compania_ide ?>">
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
				$.post('prc-mconsulta-delete',$(formulario).serialize(),function(data){
					if(data==1) {
						load('vst-consulta-listaConsultas','','.lista');
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