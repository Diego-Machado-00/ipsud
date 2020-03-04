<?php
class ConsultorioDAO {
    
    private $idconsultorio;
    private $nombre;
    
    function ConsultorioDAO($idconsultorio="", $nombre=""){
        $this -> idconsultorio = $idconsultorio ;
        $this -> nombre = $nombre;
    }
    
    function registrar(){
        return "insert into consultorio
                (nombre)
                values ('" . $this->nombre . "')";
    }
    
    function actualizar(){
        return "update consultorio set
                nombre = '" . $this -> nombre . "'
                where idconsultorio=" . $this -> id;
    }
    
    function consultar() {
        return "select nombre
                from consultorio
                where idconsultorio =" . $this -> id;
    }
    
    function consultarTodos(){
        return "select nombre
                from consultorio" ;
    }
}

?>
