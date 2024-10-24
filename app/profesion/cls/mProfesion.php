<?php class mProfesion {

	function __clone() {}
	function __construct() {}

	public function lista() {
		$sql = "SELECT * FROM vw_profesion WHERE profesion_borrado=0 ORDER BY profesion_ide DESC";
		return Enlace::sql($sql,'',3,'');
	}

	public function poride($ide) {
		$sql = "SELECT * FROM vw_profesion WHERE profesion_ide=?";
		$datos = array($ide);
		return Enlace::sql($sql,$datos,3,'');
	}

   	public function insert() {
		$sql = "SELECT sf_profesion(?,?,?,?) AS res";
		extract($_POST); 
		$datos = array(0,Funciones::may($des),1,$_SESSION['s_usua_ide']);
		return Enlace::sql($sql,$datos,4,'res');
	}
	
} ?>