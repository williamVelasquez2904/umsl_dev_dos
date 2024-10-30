<?php class mMotivo {

	function __clone() {}
	function __construct() {}

	public function lista() {
		$sql = "SELECT * FROM vw_motivo WHERE motivo_borrado=0 ORDER BY motivo_ide DESC";
		return Enlace::sql($sql,'',3,'');
	}


} ?>