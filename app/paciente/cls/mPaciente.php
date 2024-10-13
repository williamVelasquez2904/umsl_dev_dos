<?php class mPaciente {

	function __clone() {}
	function __construct() {}

	public function lista() {
		$sql = "SELECT * FROM vw_paciente ORDER BY pac_ide ASC";
		$datos = array(0);
		return Enlace::sql($sql,$datos,3,'');
	}


} ?>