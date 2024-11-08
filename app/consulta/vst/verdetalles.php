<?php require '../../../cfg/base.php'; 
echo $fn->modalWidth('80%');
$r = $mconsulta->poride($ide) ?>
<?php echo $fn->modalHeader("Detalles Consulta <b> $ide</b>") ?>
<div class="modal-body">
	<div class="msj"></div>
	<form action="" class="op_ins_enf">	
		<div class="form-group col-sm-6 col-xs-12">
			<label for="" class="control-label col-sm-12 col-xs-12 bolder">Enfermedad</label>
			<div class="col-sm-12 col-xs-12 selenf"></div> 
		</div>

			<br>
			<button class="btn btn-primary btn-sm pull-right col-sm-2 col-xs-12">
				<span class="i fa fa-plus fa-2x"></span> 
				<font size="4"> Insertar</font>
			</button>
		
		<div class="clearfix"></div>
	
		<input type="hidden" class="form-control" name="ide" value="<?php echo $r[0]->cons_ide ?>">
	</form>
	<div class="lista_enf"></div>
</div>
<?php echo $fn->modalFooter(2); ?>
<script>
	load('vst-consulta-select.enfer','','.selenf');
	load('vst-consulta-lista_enfer','ide=<?php echo $r[0]->cons_ide; ?>','.lista_enf');

</script>
<script>
	$(function(){
		var formulario = '.op_ins_enf';
		$(formulario).validate({
			errorElement: 'div',
			errorClass: 'help-block',
			focusInvalid: true,
			rules: {
				enf_ide: {
					required: true,
				}
			},

			messages: {
				enf_ide: {
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
			
				$.post('prc-mconsulta-insert_enfermedad',$(formulario).serialize(),function(data){

					if(!isNaN(data)) {
						load('vst-constulta-lista_enf','','.lista_enf');
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