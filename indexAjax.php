
<?php
require 'logica/Persona.php';
require 'logica/Administrador.php';
require 'logica/Paciente.php';
$pid = base64_decode($_GET["pid"]);
include $pid;
?>