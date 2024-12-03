<?php class mPaccompania {

	function __clone() {}
	function __construct() {}

	public function companias_por_pac_ide($pac_ide) { 
		$sql = "SELECT * FROM vw_paccompania WHERE paccia_pac_ide=? AND paccia_borrado=0";
		$datos = array($pac_ide);
		return Enlace::sql($sql,$datos,3,'');
	}

 	public function insert() {
		$sql = "SELECT sf_paccompania(?,?,?,?,?) AS res";
		extract($_POST);
		$datos = array(0,$pac_ide,$cia_ide,1,$_SESSION['s_usua_ide']);
		return Enlace::sql($sql,$datos,4,'res');
	}
} ?>