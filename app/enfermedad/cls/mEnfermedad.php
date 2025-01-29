<?php class mEnfermedad {

	function __clone() {}
	function __construct() {}

	public function lista() {
		$sql = "SELECT * FROM vw_enfermedad WHERE enf_borrado=0 ORDER BY enf_ide DESC";
		return Enlace::sql($sql,'',3,'');
	}

	public function poride($ide) {
		$sql = "SELECT * FROM vw_enfermedad WHERE enf_ide=?";
		$datos = array($ide);
		return Enlace::sql($sql,$datos,3,'');
	}

	public function porconsul($cons_ide) {
		$sql = "SELECT * FROM vw_enferxconsulta WHERE consenf_cons_ide=?";
		$datos = array($cons_ide);
		return Enlace::sql($sql,$datos,3,'');
	}

	public function insert() {
		$sql = "SELECT sf_enfermedad(?,?,?,?,?,?) AS res";
		extract($_POST); 
		$datos = array(0,Funciones::may($des),$noti,$cert,1,$_SESSION['s_usua_ide']);
		return Enlace::sql($sql,$datos,4,'res');
	}

	public function update() {
		$sql = "SELECT sf_enfermedad(?,?,?,?,?,?) AS res";
		extract($_POST); 
		$datos = array($ide,Funciones::may($des),$noti,$cert,2,$_SESSION['s_usua_ide']);
		return Enlace::sql($sql,$datos,4,'res');
	}

	public function delete() {
		$sql = "SELECT sf_enfermedad(?,?,?,?,?,?) AS res";
		extract($_POST); 
		$datos = array($ide,0,0,0,3,$_SESSION['s_usua_ide']);
		return Enlace::sql($sql,$datos,4,'res');
	}

} ?>