<?php
require 'pdf/class.ezpdf.php';
$cita = new Cita();
$citas = $cita -> consultarTodos();
$opciones = array('width' => '500');
$cols = array('id' => 'ID',
    'fecha' => 'Fecha' ,
    'hora' => 'Hora',
    'paciente' => 'Paciente',
    'medico' => 'Medico',
    'consultorio' => 'Consultorio'
    
);

$pdf =new Cezpdf();
foreach($citas as $ci){  
    $i=0;
    $pdf->ezNewPage();
    $pdf->selectFont('pdf/fonts/courier.afm');
    $pdf->ezText("<b>Detalles Citas: Paciente ".$ci->getIdcita()."</b>\n", 30, array("justification" => "center") );
    $datos[$i]=array(
        "id" => $ci->getIdcita(),
        "fecha" => $ci->getFecha(),
        "hora" => $ci->getHora(),
        "paciente" => $ci->getPaciente(),
        "medico" => $ci->getMedico(),
        "consultorio" => $ci->getConsultorio()
    );
    $pdf->ezTable($datos,$cols,"",$opciones);
    $pdf->ezText("\n\n\n",10);
    $pdf->ezText("<b>Fecha:</b> ".date("d/m/Y"),10);
    $pdf->ezText("<b>Hora:</b> ".date("H:i:s")."\n\n",10);
    $i=$i+1;
}



ob_end_clean();
$pdf->ezStream();



?>