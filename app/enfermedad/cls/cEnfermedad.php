<?php class cEnfermedad extends mEnfermedad {
	
	public function disabled() {
		$disabled = (isset($_POST['disabled']) and $_POST['disabled']==1) ? 'disabled' : null;
		return $disabled;
	}
} ?>