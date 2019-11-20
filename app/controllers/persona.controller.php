<?php


namespace App\Controller;

use App\Model\Datos\PersonaModel;
use App\Model\Entidades\PersonaEntidad;
require '../model/Entidades/personaEntidad.php';
require '../model/Datos/persona.models.php';



class PersonaController
{
    private $persona;
    private $entidad;
    public function __construct()
    {
        $this->persona = new PersonaModel();
        $this->entidad = new PersonaEntidad();
    }

    //Insertar Base De Datos
    public function insertarBaseDatos($datos){
        $id= \filter_var($datos['txtIdScope'],FILTER_SANITIZE_NUMBER_INT);
        $this->entidad->setNombreUsuario($datos['txtNombre']);
        $this->entidad->setApellidoUsuario($datos['txtApellido']);
        $this->entidad->setTelefonoUsuario($datos['txtTelefono']);
        $this->entidad->setCorreoUsuario($datos['txtCorreo']);
        $this->entidad->setIdScopeUsuario($id);
        $this->persona->insertarBaseDatos($this->entidad);

    }

    //Consulta Todos Los Registros de la tabla
    public function consultarBaseDatos(){
        $resultado = $this->persona->consultarBaseDatos();
        return $resultado;
    }

    //Consulta Registro por Id
    public function consultarBaseDatosId($idPersona){
        $idPersona = \filter_var($idPersona,FILTER_SANITIZE_NUMBER_INT);
        $this->entidad->setIdUsuario($idPersona);
        $resultado = $this->persona->consultarUsuarioId($this->entidad);
        return $resultado;
    }
    public function modificarBaseDatos($datos){
        $id= \filter_var($datos['txtIdScopeMo'],FILTER_SANITIZE_NUMBER_INT);
        $this->entidad->setNombreUsuario($datos['txtNombreMo']);
        $this->entidad->setApellidoUsuario($datos['txtApellidoMo']);
        $this->entidad->setTelefonoUsuario($datos['txtTelefonoMo']);
        $this->entidad->setCorreoUsuario($datos['txtCorreoMo']);
        $this->entidad->setIdScopeUsuario($id);
        $this->entidad->setIdUsuario($datos['idUsu']);
        return json_encode($this->persona->modificarUsuario($this->entidad));

    }
    public function eliminarBaseDatos($idPersona){
        $this->entidad->setIdUsuario($idPersona);
        return json_encode($this->persona->eliminarBaseDatos($this->entidad));
    }
}




$objet = new PersonaController();
$_POST['accion'] = \filter_var($_POST['accion'],FILTER_SANITIZE_STRING);

switch ($_POST['accion']) {

    case 'insertar':
        echo json_encode($objet->insertarBaseDatos($_POST));
        break;
    case 'consultar':
        $respuesta = $objet->consultarBaseDatos();
        echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
    break;
    case 'consultarId':
        $respuesta = $objet->consultarBaseDatosId($_POST['idPersona']);
        echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
    break;
    case 'modificar':
        echo $objet->modificarBaseDatos($_POST);
    break;
    case 'eliminar':
        echo $objet->eliminarBaseDatos($_POST['id']);
    break;
    
    default:
       echo json_encode('error');
        break;
}







?>