<?php class cUsuarios extends mUsuarios {
	
	/**
	 * Verirfica si hay una cuenta de usuario activa, si no la encuentra redirreciona a la página de login
	 * @return [type] [description]
	 */
	public function redirectLogin() {
		extract($_SESSION);
		if(!isset($s_usua_ide) or empty($s_usua_ide)) {
			header('location:login');
		}
	}
	/**
	 * Verirfica si hay una cuenta de usuario activa, si la encuentra redirreciona a la página de inicio	
	 * @return [type] [description]
	 */
	public function redirectindex() {
		extract($_SESSION);
		if(isset($s_usua_ide) and !empty($s_usua_ide)) {
			header('location:inicio');
		}
	}

	/**
	 * Comprueba la existencia de un usuario, crea la sesión y da permisos de acceso al sistema
	 * @return [type] [description]
	 */
	public function clogin() {
		$rows = $this->login();
//		print_r($rows);
		if(count($rows)>0) {
			//session_start();
			$_SESSION = array(
					's_usua_ide'=>$rows[0]->usua_ide,
					's_usua_nombre'=>$rows[0]->usua_nombre,
					's_tius_descrip'=>$rows[0]->tius_descrip,
					's_tius_ide'=>$rows[0]->tius_ide,
					's_usua_login'=>$rows[0]->usua_login,
					's_usua_tienda'=>$rows[0]->usua_tienda,
				);
			$rt = 1;
		} else {
			$rt = '¡Error!';
		}
		return $rt;
	}

	public function picture($usua_ide) {
		if(file_exists('img/fotos/'.$usua_ide.'.jpeg')) {
			$rt = 'img/fotos/'.$usua_ide.'.jpeg';
		} else {
			$rt = 'img/fotos/m.png';
		}
		return $rt;
	}

	public function cinsert() {
		extract($_POST);
		$a = Funciones::vacio($tipcli,'El tipo de cliente es obligatorio');
		$a1 = ($a==1) ? 1 : $msj[] = $a;
		if($a1==1) {
			$rt = $this->insert();
		} else {
			$rt = null;
			foreach($msj as $m) {
				$rt = $rt.$m.'<br>';
			}
		}
		return $rt;
	}

	public function cupdate() {
		extract($_POST);
		$a = Funciones::vacio($tipcli,'El tipo de cliente es obligatori0');
		$a1 = ($a==1) ? 1 : $msj[] = $a;
		if($a1==1) {
			$rt = $this->update();
		} else {
			$rt = null;
			foreach($msj as $m) {
				$rt = $rt.$m.'<br>';
			}
		}
		return $rt;
	}
} ?>