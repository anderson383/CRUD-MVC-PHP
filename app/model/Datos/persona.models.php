<?php

namespace App\Model\Datos;

use App\Model\Datos\Conexion;
use App\Model\Entidades\PersonaEntidad;
use PDO;
use PDOException;

require 'conexion.class.php';

class PersonaModel
{
    private $conex;
    private $sentencia;
    private $stmt;
    public function __construct()
    {
        $this->conex = Conexion::obtenerConexion();
    }
    //Insertar Datos
    public function insertarBaseDatos(PersonaEntidad $datos){
        try{
            $this->sentencia = "CALL insertarBd(?,?,?,?,?)";
            $this->stmt = $this->conex->prepare($this->sentencia);
            $this->stmt->bindValue(1, $datos->getNombreUsuario());
            $this->stmt->bindValue(2, $datos->getApellidoUsuario());
            $this->stmt->bindValue(3, $datos->getTelefonoUsuario());
            $this->stmt->bindValue(4, $datos->getCorreoUsuario());
            $this->stmt->bindValue(5, $datos->getIdScopeUsuario());
            $this->stmt->execute();
        } catch(PDOException $ex){

        }
    }
    //Consulta todos los datos
    public function consultarBaseDatos(){
        try {            
            $this->sentencia = "CALL paConsulta()";
            $this->stmt = $this->conex->prepare($this->sentencia);
            $this->stmt->execute();
            $persona = array();
            while($resultado = $this->stmt->fetch(PDO::FETCH_ASSOC)){
                $persona[] = $resultado;
            }
            return $persona;

        } catch (PDOException $ex) {
            
        }
    }
    //Modifica un usuario
    public function modificarUsuario(PersonaEntidad $datos){
        try{
            $this->sentencia = "CALL paModificar(?,?,?,?,?,?)";
            $this->stmt = $this->conex->prepare($this->sentencia);
            $this->stmt->bindValue(1, $datos->getNombreUsuario());
            $this->stmt->bindValue(2, $datos->getApellidoUsuario());
            $this->stmt->bindValue(3, $datos->getTelefonoUsuario());
            $this->stmt->bindValue(4, $datos->getCorreoUsuario());
            $this->stmt->bindValue(5, $datos->getIdScopeUsuario());
            $this->stmt->bindValue(6, $datos->getIdUsuario());
            $this->stmt->execute();
            if($this->stmt->rowCount()>=1){
                $respuesta = array(
                    "info" => "correcto"
                );
            }
            else{
                $respuesta = array(
                    "info" => "Error"
                );
            }
            return $respuesta;
        } catch(PDOException $e){

        }
        
    
        
    }
    //Consulta un solo dato
    public function consultarUsuarioId(PersonaEntidad $dato){
        try {           
            $this->sentencia = "CALL paConsultaId(?)";
            $this->stmt = $this->conex->prepare($this->sentencia);
            $this->stmt->bindValue(1, $dato->getIdUsuario());
            $this->stmt->execute();
            $resultado = $this->stmt->fetchObject();
            return $resultado;
        } catch (PDOException $ex) {
            
        }
    }
    //Elimina un dato
    public function eliminarBaseDatos(PersonaEntidad $dato){
        try{
            $this->sentencia = "CALL paEliminar(?)";
            $this->stmt = $this->conex->prepare($this->sentencia);
            $this->stmt->bindValue(1, $dato->getIdUsuario());
            $this->stmt->execute();
            if($this->stmt->rowCount()>=1){
                $respuesta = array(
                    "info" => "correcto"
                );
            } else {
                $respuesta = array(
                    "info" => "Error"
                );
            }
            return $respuesta;
        } catch(PDOException $e){

        }

    }

}


