<?php require '../../../cfg/base.php'; ?>
<form action="" class="op1 form-horizontal">
	<?php echo $fn->modalHeader('Insertar Informe Epidemiologico') ?>
	<div class="modal-body">
		<div class="msj"></div>
		<div class="form-group">
			<label for="" class="control-label col-sm-3 bolder">Empresa:</label>
			<div class="col-sm-9">
				<select class="form-control chosen" name="idecom" id="idecom">
					<option value=""></option>
					<?php foreach($mcompania->lista() as $c): ?>
						<option value="<?php echo $c->compania_ide ?>"><?php echo $c->compania_nombre ?></option>
					<?php endforeach; ?>
				</select>
			</div>
		</div>
		<div class="form-group">
			<label for="" class="control-label col-sm-3 bolder">Descripción:</label>
			<div class="col-sm-9">
				<input type="text" class="form-control" name="des" value="<?php echo $r->inforepi_descripcion ?>">
			</div>
		</div>
		<div class="form-group">
			<label for="" class="control-label col-sm-3 bolder">Desde:</label>
			<div class="col-sm-9">
				<input type="text" name="fecdes" class="form-control fecha" value="">
			</div>
		</div>
		<div class="form-group">
			<label for="" class="control-label col-sm-3 bolder">Hasta:</label>
			<div class="col-sm-9">
				<input type="text" name="fechas" class="form-control fecha" value="">
			</div>
		</div>
	</div>
	<input type="hidden" class="form-control" name="sta" value="0">
	<?php echo $fn->modalFooter(1) ?>
</form>
<script>
	$(function(){
		$('.chosen').chosen();
		$('.fecha').datepicker({format:'yyyy-mm-dd'});
	})
</script>
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
				$.post('prc-minforepi-insert',$(formulario).serialize(),function(data){
					if(!isNaN(data)) {
						load('vst-inforepi-lista','','.lista');
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