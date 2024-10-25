<?php class cPaciente extends mPaciente {
	
		public function buscar() {
		extract($_POST);
		/*
		$expd_pac = explode(' - ',$pac);
		$pac_ide = $expd_pac[0];*/
		$row = $this->poride($pac_ide);
		if(count($row)>0) {
			$rt = $row[0]->pac_ide;
		} else {
			$rt='no';
		}
		return $rt; 
	}
} ?>