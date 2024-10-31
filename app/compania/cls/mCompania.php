<?php class mCompania {

	function __clone() {}
	function __construct() {}

	public function lista() {
		$sql = "SELECT * FROM tbl_compania where compania_borrado=0";
		return Enlace::sql($sql,'',3,'');
	}

	public function poride($ide) {
		$sql = "SELECT * FROM tbl_compania WHERE empresa_ide=?";
		$datos = array($ide);
		return Enlace::sql($sql,$datos,3,'');
	}

	public function insert() {
		$sql = "SELECT sf_compania(?,?,?,?,?,?,?,?,?,?,?,?) AS res";
		extract($_POST); $datos = array(0,$rif,$nom,$dir,$tel,$cor,$dol,$fac,$con,$noe,1,$_SESSION['s_usua_ide']);
		return Enlace::sql($sql,$datos,4,'res');
	}

	public function update() {
		$sql = "SELECT sf_compania(?,?,?,?,?,?,?,?,?,?,?,?) AS res";
		extract($_POST); $datos = array($ide,$rif,$nom,$dir,$tel,$cor,$dol,$fac,$con,$noe,2,$_SESSION['s_usua_ide']);
		return Enlace::sql($sql,$datos,4,'res');
	}

	public function delete() {
		$sql = "SELECT sf_compania(?,?,?,?,?,?,?,?,?,?,?,?) AS res";
		extract($_POST); $datos = array($ide,0,0,0,0,0,0,0,0,0,3,$_SESSION['s_usua_ide']);
		return Enlace::sql($sql,$datos,1,'res');
	}
} ?>