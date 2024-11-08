<?php class mEnfermedad {

	function __clone() {}
	function __construct() {}

	public function lista() {
		$sql = "SELECT * FROM vw_enfermedad WHERE enf_borrado=0 ORDER BY enf_ide";
		return Enlace::sql($sql,'',3,'');
	}


	public function insert() {
		$sql = "SELECT sf_enf(?,?,?,?) AS res";
		extract($_POST); $datos = array(0,Funciones::may($des),1,$_SESSION['s_usua_ide']);
		//extract($_POST); $datos = array(0,'Pruebitas... ',1,$_SESSION['s_clien_ide']);
		return Enlace::sql($sql,$datos,4,'res');
	}
} ?>