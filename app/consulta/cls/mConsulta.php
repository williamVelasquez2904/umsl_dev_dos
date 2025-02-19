<?php class mConsulta {

	function __clone() {}
	function __construct() {}

	public function lista() {
		$sql = "SELECT * FROM vw_consulta WHERE cons_borrado=0 ORDER BY cons_ide DESC";
		return Enlace::sql($sql,'',3,'');
	}
	public function poride($ide) {
		$sql = "SELECT * FROM vw_consulta WHERE cons_ide=? AND cons_borrado=0 ORDER BY cons_ide";
		$datos = array($ide);
		return Enlace::sql($sql,$datos,3,'');
	}

	public function poride_enf($ide) {
		$sql = "SELECT * FROM vw_cons_enf WHERE consenf_ide=? AND consenf_borrado=0 ORDER BY consenf_ide";
		$datos = array($ide);
		return Enlace::sql($sql,$datos,3,'');
	}

	public function listaporpaciente($pac_ide) {
		/*
		$sql = "SELECT * FROM vw_contratoporcliente WHERE clien_ide =? and contrato_borrado = 0 ORDER BY contrato_ide DESC";*/
		$sql = "SELECT * FROM vw_consultaporpaciente WHERE pac_ide =? and cons_borrado = 0 ORDER BY cons_ide DESC";		
		$datos = array($pac_ide);
		return Enlace::sql($sql,$datos,3,'');

	}

	public function porpac_ide($pac_ide) { /*Devuelve consultas por clien_ide*/
		$sql = "SELECT * FROM vw_consulta WHERE cons_pac_ide=?  AND cons_borrado=0 ORDER BY cons_ide ASC ";
		$datos = array($pac_ide);
		return Enlace::sql($sql,$datos,3,'');
	}

	public function insert() {
		$sql = "SELECT sf_consulta(?,?,?,?,?,?,?,?) AS res";
		extract($_POST); 
		//$datos = array(0,Funciones::may($des),1,$_SESSION['s_clien_ide'])	;
		$datos = array(0,$pac_ide,$emp,$mot,$fec,0,1,$_SESSION['s_usua_ide']);

		return Enlace::sql($sql,$datos,4,'res');

	}

	public function insert_consenf() { // para enfermedades reportadas en una consulta
		$sql = "SELECT sf_consenf(?,?,?,?,?) AS res";
		extract($_POST); 
		$datos = array(0,$cons_ide,$enf_ide,1,$_SESSION['s_usua_ide']);
		return Enlace::sql($sql,$datos,4,'res');
	}

	public function delete_enfer(){
		$sql = "SELECT sf_(?,?,?,?) AS res";
		extract($_POST); $datos = array($ide,0,3,$_SESSION['s_clien_ide']);
		return Enlace::sql($sql,$datos,1,'res');
	}

	public function update() {

		$sql = "SELECT sf_consulta(?,?,?,?,?,?,?,?) AS res";
		extract($_POST);
         $datos = array(0,0,$emp,$mot,$fec,0,2,$_SESSION['s_usua_ide']);
/*		 $datos = array($ide,$rif,$nom,$nom2,$dir,$tel,$cor,2,$_SESSION['s_usua_ide']);
*/		return Enlace::sql($sql,$datos,4,'res');
	}
} ?>