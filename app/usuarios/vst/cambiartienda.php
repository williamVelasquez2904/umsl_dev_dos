<?php //require 'cfg/base.php'; ?>
<?php foreach($musuarios->poride($s_usua_ide) as $r): ?>
	<form action="" class="op2-pac well">
		<div class="msj-pac"></div>
		<fieldset><legend>Visualizar Datos de la Empresa</legend>	
			<div class="form-group col-sm-12">
    			<label for="" class="label control-label col-sm-12 bolder">Aplica a:</label>
    			<div class="col-sm-12" id="tienda">
    				<select class="form-control chosen" title="Tienda" name="tie" id="tie">
    					<?php foreach($mtienda->lista() as $t): ?>
    						<option value="<?php echo $t->empresa_ide; ?>" <?php echo $fn->select($t->empresa_ide,$r->usua_tienda) ?>><?php echo $t->empresa_nombre; ?></option>
    					<?php endforeach; ?>
    				</select>
    			</div>
    		</div>

			<div class="clearfix"></div>
			<div class="form-actions">
				<div class="btn-group pull-right">
					<button class="btn btn-primary btn-sm"><span class="i fa fa-check"></span> Aplicar Cambios</button>
				</div>
			</div>
		</fieldset>
		<input type="hidden" name="ide" value="<?php echo $r->clien_ide ?>">
	</form>
<?php endforeach; ?>
<script>
	$(function(){
		$('.chosen').chosen();
	})
</script>

<script>
	$(function(){
		var formulario = '.op2-pac';
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
				$.post('prc-musuarios-cambiartienda',$(formulario).serialize(),function(data){
					if(!isNaN(data)) {
						alert('Cambios guardados correctamente');
						location.reload();
					} else {
						alerta('.msj-pac','danger',data)
					}
				})
			},
			invalidHandler: function (form) {
			}
		});
	})
</script>