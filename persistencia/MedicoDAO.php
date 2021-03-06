<?php
class MedicoDAO {
    
    private $id;
    private $nombre;
    private $apellido;
    private $correo;
    private $clave;
    private $tarjetaprofesional;
    private $especialidad_idespecialidad;
    
    function MedicoDAO($id = "", $nombre = "", $apellido = "", $correo = "", $clave = "", $tarjetaprofesional = "", $especialidad_idespecialidad = ""){
        $this->id = $id;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->correo = $correo;
        $this->clave = $clave;
        $this->tarjetaprofesional = $tarjetaprofesional;
        $this->especialidad_idespecialidad = $especialidad_idespecialidad;
    }
    
    function registrar(){
        return "insert into medico
                (nombre, apellido, correo, clave, tarjetaprofesional,  especialidad_idespecialidad)
                values ('" . $this->nombre . "', '" . $this->apellido . "', '" . $this->correo . "', md5('" . $this->clave . "'), '" . $this->tarjetaprofesional . "', '" . $this->especialidad_idespecialidad . "')";
    }
    
    function actualizar(){
        return "update medico set
                nombre = '" . $this -> nombre . "',
                apellido='" . $this -> apellido . "',
                tarjetaprofesional ='" . $this -> tarjetaprofesional . "',
                especialidad_idespecialidad='" . $this -> especialidad_idespecialidad . "'
                where idmedico=" . $this -> id;
    }
    
    function consultar() {
        return "select nombre, apellido, correo,  tarjetaprofesional,  especialidad_idespecialidad
                from medico
                where idmedico =" . $this -> id;
    }
    
    function existeCorreo(){
        return "select idmedico from medico
                where correo = '" . $this->correo . "'";
    }
    
    function buscarPaciente($filtro){
        return "select idmedico,nombre, apellido, correo,  tarjetaprofesional,  especialidad_idespecialidad
                from medico
                where  nombre like '%" . $filtro . "%' or
                apellido like '%" . $filtro . "%'";
        
    }
    
    function consultarTodos(){
        return "select idmedico,nombre, apellido, correo, tarjetaprofesional,  especialidad_idespecialidad
                from medico
                order by apellido";
    }
}

?>
