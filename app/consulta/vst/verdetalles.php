<?php require '../../../cfg/base.php'; 
echo $fn->modalWidth('80%');
$r = $mconsulta->poride($ide) ?>
<?php echo $fn->modalHeader("Detalles Consulta <b> $ide</b>") ?>
<div class="modal-body">
	<div class="msj"></div>
	<form action="" class="op2 form-horizontal">	
		<div class="form-group col-sm-4 col-xs-12">
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
	<div class="listadetalles"></div>
</div>
<?php echo $fn->modalFooter(2); ?>