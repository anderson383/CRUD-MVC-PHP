<?php 

namespace App\Model\Entidades;

class PersonaEntidad{

    private $idUsuario;
    private $nombreUsuario;
    private $apellidoUsuario;
    private $telefonoUsuario;
    private $correoUsuario;
    private $idScopeUsuario;

    function __construct()
    {
        
    }
    public function PersonaEntidad($idUsuario,$nombreUsuario,$apellidoUsuario,$telefonoUsuario,$correoUsuario,$idScopeUsuario)
    {
        $this->idUsuario = $idUsuario;
        $this->nombreUsuario = $nombreUsuario;
        $this->apellidoUsuario = $apellidoUsuario;
        $this->telefonoUsuario = $telefonoUsuario;
        $this->correoUsuario = $correoUsuario;
        $this->idScopeUsuario = $idScopeUsuario;
        
    }
    //Metodos Get y Set
    public function getNombreUsuario(){
        return $this->nombreUsuario;
    }
    
    public function setNombreUsuario($nombreUsuario){
        $this->nombreUsuario = $nombreUsuario;
    }
    public function getApellidoUsuario(){
        return $this->apellidoUsuario;
    }
    public function setApellidoUsuario($apellidoUsuario){
        $this->apellidoUsuario = $apellidoUsuario;
    }

    public function getTelefonoUsuario(){
        return $this->telefonoUsuario;
    }
    public function setTelefonoUsuario($telefonoUsuario){
        $this->telefonoUsuario = $telefonoUsuario;
    }

    public function getCorreoUsuario(){
        return $this->correoUsuario;
    }
    public function setCorreoUsuario($correoUsuario){
        $this->correoUsuario = $correoUsuario;
    }

    public function getIdScopeUsuario(){
        return $this->idScopeUsuario;
    }
    public function setIdScopeUsuario($idScopeUsuario){
        $this->idScopeUsuario = $idScopeUsuario;
    }

    public function getIdUsuario(){
        return $this->idUsuario;
    }
    public function setIdUsuario($idUsuario){
        $this->idUsuario = $idUsuario;
    }
}













?>