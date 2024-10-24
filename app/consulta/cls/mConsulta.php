<?php class mConsulta {

	function __clone() {}
	function __construct() {}

	public function lista() {
		$sql = "SELECT * FROM vw_consulta WHERE consulta_borrado=0 ORDER BY consulta_ide DESC";
		return Enlace::sql($sql,'',3,'');
	}

	
} ?>