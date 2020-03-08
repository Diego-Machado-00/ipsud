<?php
require 'pdf/class.ezpdf.php';
$cita = new Cita();
$c = array();
$c = $cita -> consultarTodos();
$opciones = array('width' => '500');
$cols = array('id' => 'ID',
    'fecha' => 'Fecha' ,
    'hora' => 'Hora',
    'paciente' => 'Paciente',
    'medico' => 'Medico',
    'consultorio' => 'Consultorio'
    
);
$cont=0;
$pdf =new Cezpdf();
for($i=0; $i<sizeof($c);$i++){
    $f=0;
    $pdf->selectFont('pdf/fonts/courier.afm');
    $pdf->ezText("<b>Detalles Citas: Paciente ".$c[$i]->getIdcita()."</b>\n", 30, array("justification" => "center") );
    $datos[$f]=array(
        "id" => $c[$i]->getIdcita(),
        "fecha" => $c[$i]->getFecha(),
        "hora" => $c[$i]->getHora(),
        "paciente" => $c[$i]->getPaciente(),
        "medico" => $c[$i]->getMedico(),
        "consultorio" => $c[$i]->getConsultorio()
    );
    for($j=$i+1;$j<sizeof($c);$j++){
        if($c[$i]->getPaciente()==$c[$j]->getPaciente()){
            $datos[$f+1]=array(
                "id" => $c[$j]->getIdcita(),
                "fecha" => $c[$j]->getFecha(),
                "hora" => $c[$j]->getHora(),
                "paciente" => $c[$j]->getPaciente(),
                "medico" => $c[$j]->getMedico(),
                "consultorio" => $c[$j]->getConsultorio()
            );
            $cont++;
        }
    }
    $pdf->ezTable($datos,$cols,"",$opciones);
    $pdf->ezText("\n\n\n",10);
    $pdf->ezText("<b>Fecha:</b> ".date("d/m/Y"),10);
    $pdf->ezText("<b>Hora:</b> ".date("H:i:s")."\n\n",10);
    $i=$i+$cont;
    $pdf -> eznewPage();
    
}




ob_end_clean();
$pdf->ezStream();



?>