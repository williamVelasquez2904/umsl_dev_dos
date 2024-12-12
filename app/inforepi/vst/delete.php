<?php require '../../../cfg/base.php'; 
foreach($minforepi->poride($ide) as $r): ?>
	<form action="" class="op3 form-horizontal">
		<?php echo $fn->modalHeader('Borrar Informe Epidemiologico') ?>
		<div class="modal-body">
			<div class="msj"></div>
			<div class="form-group">
				<label for="" class="control-label col-sm-3 bolder">Empresa:</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" name="nom" value="<?php echo $r->compania_nombre ?>" disabled>
				</div>
			</div>
			<div class="form-group">
				<label for="" class="control-label col-sm-3 bolder">Descripción:</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" name="des" value="<?php echo $r->inforepi_descripcion ?>" disabled>
				</div>
			</div>
			<div class="form-group">
				<label for="" class="control-label col-sm-3 bolder">Desde:</label>
				<div class="col-sm-9">
					<input type="text" name="fecdes" class="form-control fecha" value="<?php echo date('Y-m-d',strtotime($r->inforepi_fecdes)); ?>" disabled>
				</div>
			</div>
			<div class="form-group">
				<label for="" class="control-label col-sm-3 bolder">Hasta:</label>
				<div class="col-sm-9">
					<input type="text" name="fechas" class="form-control fecha" value="<?php echo date('Y-m-d',strtotime($r->inforepi_fechas)); ?>" disabled>
				</div>
			</div>
		</div>
		<?php echo $fn->modalFooter(1) ?>
		<input type="hidden" class="form-control" name="ide" value="<?php echo $r->inforepi_ide ?>">
		<input type="hidden" class="form-control" name="idecom" value="<?php echo $r->inforepi_compania_ide ?>">
		<input type="hidden" class="form-control" name="sta" value="<?php echo $r->inforepi_status ?>">
	</form>
<?php endforeach; ?>
<script>
	$(function(){
		$('.chosen').chosen();
		$('.fecha').datepicker({format:'yyyy-mm-dd'});
	})
</script>
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
				$.post('prc-minforepi-delete',$(formulario).serialize(),function(data){
					if(data==1) {
						load('vst-inforepi-lista','','.lista');
						alert('Registro borrado logicamente de forma correcta');
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