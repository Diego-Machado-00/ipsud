<?php 
require 'pdf/class.ezpdf.php';
$paciente = new Paciente();
$pacientes = $paciente->consultarTodos();
$pdf =new Cezpdf('a4');
$pdf->selectFont('pdf/fonts/courier.afm');
$pdf->ezText("<b>Detalles Pacientes</b>\n", 30, array("justification" => "center") );
$opciones = array('width' => '500');
$cols = array('id' => 'ID', 
              'nombre' => 'Nombre' , 
              'apellido' => 'Apellido',
              'cedula' => 'Cedula',
              'estado' => 'Estado',
              'foto' => 'Foto',
              'direccion' => 'Direccion',
              'telefono' => 'Telefono'
    
);
$i=0;

foreach($pacientes as $pa){
    $datos[$i]=array("id" => $pa->getId(),
                     "nombre" => $pa->getNombre(),
                     "apellido" => $pa->getApellido(),
                     "cedula" => (($pa->getCedula()!="")?$pa->getCedula():"-------"),
                     "estado" => (($pa->getEstado()==0)?"Inactivo":"Activo"),
                     "foto" => (($pa->getFoto() != "") ? $pdf->ezImage("/ipsudD/fotos/" . $pa->getFoto(),0,10,1,'left') : ""),
                     "direccion" => (($pa->getDireccion()!="")?$pa->getDireccion():"-------"),
                     "telefono" => (($pa->getTelefono()!="")?$pa->getTelefono():"-------") 
    );
    $i=$i+1;   
}  


$pdf->ezTable($datos,$cols,"",$opciones);
$pdf->ezText("\n\n\n",10);
$pdf->ezText("<b>Fecha:</b> ".date("d/m/Y"),10);
$pdf->ezText("<b>Hora:</b> ".date("H:i:s")."\n\n",10);

ob_end_clean();
$pdf->ezStream();



?>