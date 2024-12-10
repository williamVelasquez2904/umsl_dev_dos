<?php require '../../../cfg/base.php';
//var_dump($ide);
/*$row = $mconsulta->poride($ide);var_dump($row);*/
foreach($mconsulta->poride($ide) as $r): ?>
	<form action="" class="op2 form-horizontal">
		<?php echo $fn->modalHeader('Editar Consulta') ?>
		<div class="modal-body">
			<div class="msj"></div>

		<div class="form-group">
			<label for="" class="label control-label col-sm-4 bolder">Empresa</label>
			<div class="col-sm-8" id="tienda">
				<select class="form-control chosen" title="Empresa" name="emp" id="emp">
					<option value=""></option>
					<?php foreach($mcompania->lista() as $c): ?>
						<option value="<?php echo $c->compania_ide; ?>"<?php echo $fn->select($c->compania_ide,$r->cons_empresa_ide) ?>

						>
					<?php echo $c->compania_ide." - ".$c->compania_nombre; ?></option>
					<?php endforeach; ?>
				</select>
			</div>
		</div>


			<div class="form-group">
				<label for="" class="label control-label col-sm-4 bolder">Fecha</label>
				<div class="col-sm-8">
					<input type="text" name="fec" class="form-control fecha" value="<?php echo date('d-m-Y',strtotime($r->cons_fecha)); ?>">
				</div>
			</div>


			<div class="form-group">
				<label for="" class="label control-label col-sm-4 bolder">Motivo </label>
				<div class="col-sm-8" id="tipcli">

				<select class="form-control chosen" title="Motivo" name="mot" id="mot" >
					<?php foreach($mmotivo->lista() as $m): ?>
						<option value="<?php echo $m->motivo_ide ?>"<?php echo $fn->select($m->motivo_ide,$r->cons_motivo_ide) ?>>
							<?php echo $m->motivo_ide.'-'. $m->motivo_descrip ?></option>
					<?php endforeach; ?>
				</select>


				</div>
			</div>


		</div>
		<?php echo $fn->modalFooter(1) ?>
		<input type="hidden" class="form-control" name="ide" value="<?php echo $r->compania_ide ?>">
	</form>
<?php endforeach; ?>

<script>
	$(function(){
		$('.chosen').chosen();
		$( ".fecha" ).datepicker({
			autoclose:true
	    }).next().on(ace.click_event, function(){
			 $(this).prev().focus();
		});

	})
</script>
<script>
	$(function(){
		var formulario = '.op2';
		$(formulario).validate({
			errorElement: 'div',
			errorClass: 'help-block',
			focusInvalid: true,
			rules: {
				rif: {
					required: true,
				},
				nom: {
					required: true,
				}
			},

			messages: {
				rif: {
					required: 'Obligatorio',
				},
				nom: {
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
				$.post('prc-mconsulta-update',$(formulario).serialize(),function(data){
					if(!isNaN(data)) {
						load('vst-consulta-lista','','.lista');
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