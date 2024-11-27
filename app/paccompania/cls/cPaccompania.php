<?php class cPaccompania extends mPaccompania {
	
	public function disabled() {
		$disabled = (isset($_POST['disabled']) and $_POST['disabled']==1) ? 'disabled' : null;
		return $disabled;
	}

	public function insert() {
		$sql = "SELECT sf_paccompania(?,?,?,?,?,?) AS res";
		extract($_POST);
		$datos = array(0,$pac_ide,$compania_ide,$cta,1,$_SESSION['s_clien_ide']);
		return Enlace::sql($sql,$datos,4,'res');
	}
} ?>