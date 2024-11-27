<?php class mPaccompania {

	function __clone() {}
	function __construct() {}

	public function companias_por_pac_ide($pac_ide) { 
		$sql = "SELECT * FROM vw_paccompania WHERE paccia_ide=? AND paccia_borrado=0";
		$datos = array($pac_ide);
		return Enlace::sql($sql,$datos,3,'');
	}

} ?>