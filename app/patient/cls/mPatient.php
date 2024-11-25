<?php class mPatient { 

	function __clone() {}
	function __construct() {}

	public function lista() {
		$sql = "SELECT * FROM vw_paciente ORDER BY pac_ide ASC";
		$datos = array(0);
		return Enlace::sql($sql,$datos,3,'');
	}

	public function listasinide($ide) {
		$sql = "SELECT * FROM vw_paciente WHERE clien_ide<>? ORDER BY clien_nombre1 ASC";
		$datos = array($ide);
		return Enlace::sql($sql,$datos,3,'');
	}

	public function poride($ide) {
		$sql = "SELECT * FROM vw_paciente WHERE pac_ide=?";
		$datos = array($ide);
		return Enlace::sql($sql,$datos,3,'');
	}

	public function insert() {
		extract($_POST);//var_dump($tipcli);


		/*$sql = "SELECT sf_cliente(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?) AS res";*/
		$sql = "SELECT sf_patient(?,?,?,?,?,?,?,?,?,?,?,?,?) AS res";
		$datos = array(
			0, // Identificador
			$tipcli,
			$ced,
			Funciones::may($nom),
			Funciones::may($ape),
			$sexo,
			date('Y-m-d',strtotime($fnac)),
			Funciones::may($dir),
			$grado_ide,
			$mov,
			Funciones::may($corre),
			1, //  operación
			$_SESSION['s_usua_ide'] #Usuario que realiza operación
		);
/*		var_dump($datos);
*/
		return Enlace::sql($sql,$datos,4,'res');
	}

	public function insertRapido() {
		extract($_POST);
		$nom2  = null;
		$ape2  = null;
		$fnac  = null;
		$dir   = null;
		$mov   = null;
		$corre = null;


		$sql = "SELECT sf_cliente(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?) AS res";
		$datos = array(
			0,
			$tipcli,
			$ced,
			Funciones::may($cod),
			Funciones::may($nom1),
			Funciones::may($nom2),
			Funciones::may($ubimap),
			date('Y-m-d',strtotime($fnac)),
			Funciones::may($dir),
			$mov,
			Funciones::may($corre),
			$coes,
			$zona,
			$vende,
			4,
			$_SESSION['s_usua_ide']
		);
		return Enlace::sql($sql,$datos,4,'res');
	}

	public function update() {
		extract($_POST);
/*		$sql = "SELECT sf_patient(?,?,?,?,?,?,?,?,?) AS res";
*/		$sql = "SELECT sf_patient(?,?,?,?,?,?,?,?,?,?,?,?,?) AS res";
		$datos = array(
			$pac_ide, // Identificador
			$tipcli,
			$ced,
			Funciones::may($nom),
			Funciones::may($ape),
			$sexo,
			date('Y-m-d',strtotime($fnac)),
			Funciones::may($dir),
			$grado_ide,
			$mov,
			Funciones::may($corre),
			2, //  operación
			$_SESSION['s_usua_ide'] #Usuario que realiza operación
		);
/*		$datos = array(
			$pac_ide,
			$ced, 
			Funciones::may($nom),
			Funciones::may($ape),
			date('Y-m-d',strtotime($fnac)),
			$sexo,
			$grado,
			2,
			$_SESSION['s_usua_ide']
		);*/
		return Enlace::sql($sql,$datos,4,'res');
	}

	public function delete() {
		extract($_POST);
		$sql = "SELECT sf_cliente(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?) AS res";
		$datos = array($ide,0,0,0,0,0,0,'0000-00-00',0,0,0,0,0,0,3,$_SESSION['s_usua_ide']);
		return Enlace::sql($sql,$datos,4,'res');
	}

	public function reactivarlo() {
		extract($_POST);
		$sql = "SELECT sf_cliente(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?) AS res";
		print_r($ide);
		$datos = array($ide,0,0,0,0,0,0,'0000-00-00',0,0,0,0,0,0,8,$_SESSION['s_usua_ide']);
		return Enlace::sql($sql,$datos,4,'res');
	}


} ?>