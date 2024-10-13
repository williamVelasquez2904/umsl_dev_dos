<?php class mEnfermedad {

	function __clone() {}
	function __construct() {}

	public function lista() {
		$sql = "SELECT * FROM vw_banco WHERE banco_borrado=0 ORDER BY banco_ide DESC";
		return Enlace::sql($sql,'',3,'');
	}

} ?>