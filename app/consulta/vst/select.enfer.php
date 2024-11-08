<?php require '../../../cfg/base.php'; ?>
<select class="form-control chosen" title="Enfermedad" name="enf_ide" id="enf_ide" >
	<option value=""></option>
	<?php foreach($menfermedad->lista() as $e): 
		$mostrar=""; // ojo
		?>
		<option value="<?php echo $e->enf_ide ?>" <?php echo $mostrar; ?>>
		<?php echo $e->enf_ide.'-'. $e->enf_descrip ?></option>
	<?php endforeach; ?>
</select>

<script>
	$(function(){
		$('.chosen').chosen();
	})
</script> 