<?php class mInforepi {

	function __clone() {}
	function __construct() {}

	public function lista() {
		$sql = "SELECT * FROM vw_informe_epidemiologico ORDER BY inforepi_descripcion";
		return Enlace::sql($sql,'',3,'');
	}

	public function poride($ide) {
		$sql = "SELECT * FROM vw_informe_epidemiologico WHERE inforepi_ide=?";
		$datos = array($ide);
		return Enlace::sql($sql,$datos,3,'');
	}

	public function insert() {
		$sql = "SELECT sf_inforepi(?,?,?,?,?,?,?,?,?) AS res";
		extract($_POST); 
		$datos = array(0,$idecom,$des,$fecdes,$fechas,$sta,$_SESSION['s_usua_tienda'],1,$_SESSION['s_usua_ide']);
		return Enlace::sql($sql,$datos,4,'res');
	}

	public function update() {
		$sql = "SELECT sf_inforepi(?,?,?,?,?,?,?,?,?) AS res";
		extract($_POST); 
		$datos = array($ide,$idecom,$des,
			date('Y-m-d',strtotime($fecdes)),
			date('Y-m-d',strtotime($fechas)),
			$sta,$_SESSION['s_usua_tienda'],2,$_SESSION['s_usua_ide']);
		return Enlace::sql($sql,$datos,4,'res');
	}

	public function delete() {
		$sql = "SELECT sf_inforepi(?,?,?,?,?,?,?,?,?) AS res";
		extract($_POST); 
		$datos = array($ide,0,0,0,0,0,$_SESSION['s_usua_tienda'],3,$_SESSION['s_usua_ide']);
		return Enlace::sql($sql,$datos,4,'res');
	}
} ?>