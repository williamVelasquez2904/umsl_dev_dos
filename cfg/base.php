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
		'consulta'  =>array('mConsulta','cConsulta'),		
		'enfermedad'=>array('mEnfermedad','cEnfermedad'),
		'tipclien'  =>array('mTipclien','cTipclien'),
		'tipousua'  =>array('mTipousua','cTipousua'),
		'permisos'  =>array('mPermisos','cPermisos'),
		'permfich'  =>array('mPermfich','cPermfich'),
		'profesion' =>array('mProfesion','cProfesion'),
		'patient'   =>array('mPatient','cPatient'),
		'paciente'  =>array('mPaciente','cPaciente'),
		'compania'  =>array('mCompania','cCompania'),		
		'tienda'    =>array('mTienda','cTienda'),
		'inforepi'  =>array('mInforepi','cInforepi'),
		'reportes'  =>array('mReportes','cReportes'),
		'motivo'  =>array('mMotivo','cMotivo'),
		'auditoria' =>array('mAuditoria','cAuditoria')
	);
# Instanciacin de clases
$fn = new Funciones();
foreach($archivos as $ind=>$val) {
	foreach($val as $file) {
		require $ruta_acceso_archivos.'app/'.$ind.'/cls/'.$file.'.php';
		$ins = strtolower($file);
		$$ins = new $file();
	}
}
?>