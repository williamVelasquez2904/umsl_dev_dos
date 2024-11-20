<?php require '../../../cfg/base.php'; 
$rowpac=$mreportes->listapaci();
require('../../../lib/fpdf/fpdf.php');
date_default_timezone_set('America/Caracas');
class PDF extends FPDF {
	function Header() {
		$this->SetY(15);
		$this->SetFont('Arial','B',8);
		$this->SetFillColor(255,255,255);
		$this->Cell(190,5,'ASOCIACION CIVIL INSTITUTO MARIA MONTESSORI',0,1,'R',1);
		//($file, $x=null, $y=null, $w=0, $h=0, $type='', $link='')
		$this->Image('../../../img/umsl_logo.png',10,3,36,18);
	}

	function Footer() {
		$this->SetY(-20);
		$this->Cell(190,5,'UNIDAD MEDICA SAN LUIS CA, RIF: J-30843945-2, EMAIL: umsl.citas@gmail.com',0,1,'C',1);
		$this->Cell(190,5,'TELEFONOS 0276 3534079 / 3534311  Avenida Principal Urbanización Pirineos Parcela No. 243, Edificio Unidad Médica San Luis, Parroquia',0,1,'C',1);
		$this->Cell(190,5,'Pedro María Morantes, San Cristóbal, Táchira.',0,1,'C',1);
	}
}

$pdf = new PDF();
$pdf->AliasNbPages();
// Primera forma de hacerlo
$pdf->AddPage('P');
// Segunda forma de hacerlo
// $pdf=new FPDF('P','mm',array(100,200));
// $pdf->AddPage();
/* Añadimos el nuevo tipo de letra */
//$pdf->AddFont('Anton-Regular','','Anton-Regular.php');
/* Declaramos que queremos usar ese tipo de letra */
//$pdf->SetFont('Anton-Regular','',15);
$pdf->SetFont('Arial','B',8);
/* Lo imprimimos */
$pdf->SetFillColor(255,255,255);
$pdf->Cell(190,10,'ACCIDENTES COMUNES, ACCIDENTES DE TRABAJO, ENFERMEDADES COMUNES Y ENERMEDADES OCUPACIONALES',0,1,'C',1);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(38,4,'PERIODO','RTL',0,'C',1);
$pdf->Cell(38,4,'ACCIDENTES','RTL',0,'C',1);
$pdf->Cell(38,4,'ACCIDENTES','RTL',0,'C',1);
$pdf->Cell(38,4,'ENFERMEDADES','RTL',0,'C',1);
$pdf->Cell(38,4,'ENFERMEDADES','RTL',1,'C',1);
$pdf->Cell(38,4,'','RL',0,'C',1);
$pdf->Cell(38,4,'COMUNES','RL',0,'C',1);
$pdf->Cell(38,4,'DE TRABAJO','RL',0,'C',1);
$pdf->Cell(38,4,'COMUNES','RBL',0,'C',1);
$pdf->Cell(38,4,'OCUPACIONALES','RL',1,'C',1);
$pdf->Cell(38,5,'Julio del 2024',1,0,'C',1);
$pdf->Cell(38,5,'0',1,0,'C',1);
$pdf->Cell(38,5,'1',1,0,'C',1);
$pdf->Cell(38,5,'54',1,0,'C',1);
$pdf->Cell(38,5,'0',1,1,'C',1);

$pdf->Cell(190,5,'',0,1,'L',1);
$pdf->MultiCell(190,5,'COMENTARIO: SE EVIDENCIA QUE EN EL MES DE: julio del 2024 ASISTIERON 50 PACIENTE(S) DE LOS CUALES: 35 ESTAN SANO(S) Y 54 ENFERMEDAD(ES) COMUN(ES) EN 50 TRABAJADORES, ES IMPORTANTE RESALTAR QUE LAS ENFERMEDADES COMUNES SE PUEDEN REPORTAR VARIAS EN UN MISMO PACIENTE.',0,'J',0);

$pdf->Cell(190,5,'',0,1,'L',1);
$pdf->Cell(190,5,'RESULTADO DE LOS EXAMENES PRACTICADOS',0,1,'C',1);
$pdf->SetFillColor(225,249,255);
$pdf->Cell(21,5,'FECHA',1,0,'C',1);
$pdf->Cell(75,5,'NOMBRE',1,0,'C',1);
$pdf->Cell(22,5,'C.I.',1,0,'C',1);
$pdf->Cell(34,5,'CONSULTA',1,0,'C',1);
$pdf->Cell(38,5,'RESULTADO',1,1,'C',1);

$pdf->SetFillColor(255,255,255);
foreach ($rowpac as $p) {
	$nombre = $p->pac_nombre1.' '.$p->pac_nombre2.' '.$p->pac_apelli1.' '.$p->pac_apelli2;
	$ci = $p->pac_tipo."-".$p->pac_numiden;
	$pdf->Cell(21,5,'12-11-2024',1,0,'C',1);
	$pdf->Cell(75,5,"$nombre",1,0,'L',1);
	$pdf->Cell(22,5,"$ci",1,0,'C',1);
	$pdf->Cell(34,5,'POST VACACIONAL',1,0,'C',1);
	$pdf->Cell(38,5,'APTO CON LIMITACIONES',1,1,'C',1);
}

$pdf->Cell(190,5,'',0,1,'L',1);
$pdf->MultiCell(190,5,'EL COMITE DE HIGIENE Y SEGURIDAD DE LA EMPRESA DEBE REALIZAR SEGUIMIENTO DE LOS NO APTOS Y APTOS CON LIMITACION DE MANERA DE DISMINUIR LAS ENFERMEDADES COMUNES Y OCUPACIONALES.',0,'J',0);

$pdf->Cell(190,5,'',0,1,'L',1);
$pdf->Cell(190,5,'REFERENCIAS A OTROS MEDICOS',0,1,'C',1);
$pdf->SetFillColor(225,249,255);
$pdf->Cell(17,5,'FECHA',1,0,'C',1);
$pdf->Cell(75,5,'NOMBRE',1,0,'C',1);
$pdf->Cell(22,5,'C.I.',1,0,'C',1);
$pdf->Cell(34,5,'CONSULTA',1,0,'C',1);
$pdf->Cell(42,5,'REFERENCIA',1,1,'C',1);

$pdf->SetFillColor(255,255,255);
//foreach ($rowpac as $p) {
//	$nombre = $p->pac_nombre1.' '.$p->pac_nombre2.' '.$p->pac_apelli1.' '.$p->pac_apelli2;
//	$ci = $p->pac_tipo."-".$p->pac_numiden;
	$nombre = "JOSE ATILANO GIL MERCHAN";
	$ci = "V.-13303247";
	$pdf->Cell(17,5,'12-11-2024',1,0,'C',1);
	$pdf->Cell(75,5,"$nombre",1,0,'L',1);
	$pdf->Cell(22,5,"$ci",1,0,'C',1);
	$pdf->Cell(34,5,'TRAUMATOLOGIA',1,0,'C',1);
	$pdf->MultiCell(42,5,'FRACTURA NO DESPLAZADA DE LA FALANGE DISTAL DE 5 DEDO MANO IZQ',1,'L',0);
//}
$pdf->Cell(190,5,'',0,1,'L',1);
$pdf->MultiCell(190,5,'EL COMITE DE HIEGIENE Y SEGURIDAD DE LA EMPRESA DEBE REALIZAR SEGUIMIENTO DE LAS REFERENCIAS MÉDICAS PARA ASEGURAR  QUE SEAN  CUMPLIDAS.',0,'J',0);

$pdf->Cell(190,5,'',0,1,'L',1);
$pdf->Cell(190,5,'REPOSOS',0,1,'C',1);
$pdf->SetFillColor(225,249,255);
$pdf->Cell(17,5,'FECHA',1,0,'C',1);
$pdf->Cell(75,5,'NOMBRE',1,0,'C',1);
$pdf->Cell(22,5,'C.I.',1,0,'C',1);
$pdf->Cell(34,5,'CONSULTA',1,0,'C',1);
$pdf->Cell(42,5,'REPOSO',1,1,'C',1);

$pdf->SetFillColor(255,255,255);
//foreach ($rowpac as $p) {
//	$nombre = $p->pac_nombre1.' '.$p->pac_nombre2.' '.$p->pac_apelli1.' '.$p->pac_apelli2;
//	$ci = $p->pac_tipo."-".$p->pac_numiden;
	$nombre = "JOSE ATILANO GIL MERCHAN";
	$ci = "V.-13303247";
	$pdf->Cell(17,5,'12-11-2024',1,0,'C',1);
	$pdf->Cell(75,5,"$nombre",1,0,'L',1);
	$pdf->Cell(22,5,"$ci",1,0,'C',1);
	$pdf->Cell(34,5,'PERIODICA',1,0,'C',1);
	$pdf->MultiCell(42,5,'AMERITA REPOSO DOMICILIARIO DE 21 DIAS',1,'L',0);
//}

$pdf->AddPage('P');

$pdf->Cell(190,5,'TABLA: CARACTERISTICAS GENERALES DEL MES',0,1,'C',1);
$pdf->SetFillColor(225,249,255);
$pdf->Cell(94,5,'GRUPO ETARIOS',1,0,'L',1);
$pdf->Cell(48,5,'50',1,0,'C',1);
$pdf->Cell(48,5,'%',1,1,'C',1);

$pdf->SetFillColor(255,255,255);
$pdf->Cell(94,5,'51-60 Y MAS',1,0,'L',1);
$pdf->Cell(48,5,"3",1,0,'C',1);
$pdf->Cell(48,5,'6.00',1,1,'C',1);
$pdf->Cell(94,5,'41-50',1,0,'L',1);
$pdf->Cell(48,5,"16",1,0,'C',1);
$pdf->Cell(48,5,'32.00',1,1,'C',1);
$pdf->Cell(94,5,'31-40',1,0,'L',1);
$pdf->Cell(48,5,"19",1,0,'C',1);
$pdf->Cell(48,5,'38.00',1,1,'C',1);
$pdf->Cell(94,5,'21-30',1,0,'L',1);
$pdf->Cell(48,5,"10",1,0,'C',1);
$pdf->Cell(48,5,'20.00',1,1,'C',1);
$pdf->Cell(94,5,'15-20',1,0,'L',1);
$pdf->Cell(48,5,"2",1,0,'C',1);
$pdf->Cell(48,5,'4.00',1,1,'C',1);

$pdf->SetFillColor(225,249,255);
$pdf->Cell(94,5,'GRUPO POR SEXO',1,0,'L',1);
$pdf->Cell(48,5,'50',1,0,'C',1);
$pdf->Cell(48,5,'%',1,1,'C',1);

$pdf->SetFillColor(255,255,255);
$pdf->Cell(94,5,'FEMENINO',1,0,'L',1);
$pdf->Cell(48,5,"35",1,0,'C',1);
$pdf->Cell(48,5,'78.00',1,1,'C',1);
$pdf->Cell(94,5,'MASCULINO',1,0,'L',1);
$pdf->Cell(48,5,"11",1,0,'C',1);
$pdf->Cell(48,5,'22.0',1,1,'C',1);

$pdf->SetFillColor(225,249,255);
$pdf->Cell(94,5,'GRADO DE INSTRUCCION',1,0,'L',1);
$pdf->Cell(48,5,'50',1,0,'C',1);
$pdf->Cell(48,5,'%',1,1,'C',1);

$pdf->SetFillColor(255,255,255);
$pdf->Cell(94,5,'ANALFABETA',1,0,'L',1);
$pdf->Cell(48,5,"",1,0,'C',1);
$pdf->Cell(48,5,'0.00',1,1,'C',1);
$pdf->Cell(94,5,'PRIMARIA',1,0,'L',1);
$pdf->Cell(48,5,"4",1,0,'C',1);
$pdf->Cell(48,5,'8.00',1,1,'C',1);
$pdf->Cell(94,5,'BACHILLER',1,0,'L',1);
$pdf->Cell(48,5,"8",1,0,'C',1);
$pdf->Cell(48,5,'16.00',1,1,'C',1);
$pdf->Cell(94,5,'TSU',1,0,'L',1);
$pdf->Cell(48,5,"7",1,0,'C',1);
$pdf->Cell(48,5,'14.00',1,1,'C',1);
$pdf->Cell(94,5,'UNIVERSITARIO',1,0,'L',1);
$pdf->Cell(48,5,"31",1,0,'C',1);
$pdf->Cell(48,5,'62.00',1,1,'C',1);
$pdf->Cell(94,5,'POSTGRADO',1,0,'L',1);
$pdf->Cell(48,5,"",1,0,'C',1);
$pdf->Cell(48,5,'0.00',1,1,'C',1);
$pdf->Cell(94,5,'OTROS',1,0,'L',1);
$pdf->Cell(48,5,"",1,0,'C',1);
$pdf->Cell(48,5,'0.00',1,1,'C',1);

$pdf->SetFillColor(225,249,255);
$pdf->Cell(94,5,'ENFERMEDADES COMUNES',1,0,'L',1);
$pdf->Cell(48,5,'54',1,0,'C',1);
$pdf->Cell(48,5,'%',1,1,'C',1);

$rowenfpac = $mreportes->listaenfermedadpaciente();
$pdf->SetFillColor(255,255,255);
foreach ($rowenfpac as $ep) { 
	$pdf->Cell(94,5,"$ep->enf_descrip",1,0,'L',1);
	$pdf->Cell(48,5,"$ep->CantPaciEnfe",1,0,'C',1);
	$pdf->Cell(48,5,"$ep->PorcPaciEnfe",1,1,'C',1);
}

$pdf->SetFillColor(225,249,255);
$pdf->Cell(94,5,'MOTIVO DE CONSULTA',1,0,'L',1);
$pdf->Cell(48,5,'50',1,0,'C',1);
$pdf->Cell(48,5,'%',1,1,'C',1);

$pdf->SetFillColor(255,255,255);
$pdf->Cell(94,5,'EGRESO',1,0,'L',1);
$pdf->Cell(48,5,"",1,0,'C',1);
$pdf->Cell(48,5,'0.00',1,1,'C',1);
$pdf->Cell(94,5,'PERIODICO',1,0,'L',1);
$pdf->Cell(48,5,"4",1,0,'C',1);
$pdf->Cell(48,5,'8.00',1,1,'C',1);
$pdf->Cell(94,5,'INGRESO',1,0,'L',1);
$pdf->Cell(48,5,"",1,0,'C',1);
$pdf->Cell(48,5,'0.00',1,1,'C',1);
$pdf->Cell(94,5,'PRE-VACACIONAL',1,0,'L',1);
$pdf->Cell(48,5,"46",1,0,'C',1);
$pdf->Cell(48,5,'92.00',1,1,'C',1);
$pdf->Cell(94,5,'POST-VACACIONAL',1,0,'L',1);
$pdf->Cell(48,5,"",1,0,'C',1);
$pdf->Cell(48,5,'0.00',1,1,'C',1);
$pdf->Cell(94,5,'PRE-EMPLEO',1,0,'L',1);
$pdf->Cell(48,5,"",1,0,'C',1);
$pdf->Cell(48,5,'0.00',1,1,'C',1);

$pdf->SetFillColor(225,249,255);
$pdf->Cell(94,5,'RESULTADO DE LA CONSULTA',1,0,'L',1);
$pdf->Cell(48,5,'50',1,0,'C',1);
$pdf->Cell(48,5,'%',1,1,'C',1);

$pdf->SetFillColor(255,255,255);
$pdf->Cell(94,5,'APTO',1,0,'L',1);
$pdf->Cell(48,5,"49",1,0,'C',1);
$pdf->Cell(48,5,'98.00',1,1,'C',1);
$pdf->Cell(94,5,'APTO CON LIMITACION',1,0,'L',1);
$pdf->Cell(48,5,"",1,0,'C',1);
$pdf->Cell(48,5,'0.00',1,1,'C',1);
$pdf->Cell(94,5,'NO APTO',1,0,'L',1);
$pdf->Cell(48,5,"1",1,0,'C',1);
$pdf->Cell(48,5,'2.00',1,1,'C',1);

$pdf->AddPage('P');

$pdf->Cell(190,5,'RESUMEN DEL MES DE julio del 2024',1,1,'C',1);

$gragrueta=$_POST['vargrueta'];
$img = explode(',',$gragrueta,2)[1];
$pic = 'data://text/plain;base64,'. $img;
$pdf->Image($pic, 0,30,125,0,'png');

$gragrusex=$_POST['vargrusex'];
$img = explode(',',$gragrusex,2)[1];
$pic = 'data://text/plain;base64,'. $img;
$pdf->Image($pic, 101,30,125,0,'png');

$grafico=$_POST['vargrains'];
$img = explode(',',$grafico,2)[1];
$pic = 'data://text/plain;base64,'. $img;
$pdf->Image($pic, 0,100,125,0,'png');

$gramotcon=$_POST['varmotcon'];
$img = explode(',',$gramotcon,2)[1];
$pic = 'data://text/plain;base64,'. $img;
$pdf->Image($pic, 101,100,125,0,'png');

$grarescon=$_POST['varrescon'];
$img = explode(',',$grarescon,2)[1];
$pic = 'data://text/plain;base64,'. $img;
$pdf->Image($pic, 51,170,125,0,'png');

$pdf->SetY(250);
$pdf->Cell(190,5,'FUENTE: UNIDAD MÉDICA SAN LUIS C.A. – julio del 2024',0,1,'C',1);

$pdf->AddPage('P');

$pdf->Cell(190,5,'RESUMEN DEL MES DE julio del 2024',1,1,'C',1);
$gragruenf=$_POST['vargruenf'];
$img = explode(',',$gragruenf,2)[1];
$pic = 'data://text/plain;base64,'. $img;
$pdf->Image($pic, 20,30,175,0,'png');

$pdf->SetY(255);
$pdf->Cell(190,5,'FUENTE: UNIDAD MÉDICA SAN LUIS C.A. – julio del 2024',0,1,'C',1);

$pdf->Output();
//$pdf->Output("Informe.pdf","F"); 
?>