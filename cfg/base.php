<?php 
# Configura la ruta de acceso de los archivos al sistema
$ruta_acceso_archivos = (file_exists('cfg/config.php')) ? '' : '../../../';
# Llama a las librer铆as principales
require $ruta_acceso_archivos.'cfg/config.php';
require $ruta_acceso_archivos.'cfg/conexion.php';
require $ruta_acceso_archivos.'cfg/funciones.php';
# Reune todos los archivos y carpetas dentro de app
$archivos = array(
		'usuarios'  =>array('mUsuarios','cUsuarios'),
		'enfermedad'=>array('mEnfermedad','cEnfermedad'),
		'tipclien'  =>array('mTipclien','cTipclien'),
		'tipousua'  =>array('mTipousua','cTipousua'),
		'permisos'  =>array('mPermisos','cPermisos'),
		'permfich'  =>array('mPermfich','cPermfich'),
		'patient'   =>array('mPatient','cPatient'),		
		'paciente'  =>array('mPaciente','cPaciente'),
		'tienda'    =>array('mTienda','cTienda'),
		'auditoria' =>array('mAuditoria','cAuditoria')
	);
# Instanciaci贸n de clases
$fn = new Funciones();
foreach($archivos as $ind=>$val) {
	foreach($val as $file) {
		require $ruta_acceso_archivos.'app/'.$ind.'/cls/'.$file.'.php';
		$ins = strtolower($file);
		$$ins = new $file();
	}
}
?>