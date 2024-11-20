<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/Actividad2DesarrollodeAPP/Infrastructure/Lib/Config.php";  
require_once $_SERVER["DOCUMENT_ROOT"] . "/Actividad2DesarrollodeAPP/Domain/Model/UsuarioModel.php";

use ActiveRecord\Model;

class UsuarioEntity extends ActiveRecord\Model {  

    public static $table_name = "Estudiantes";

    public static $primary_key = "cedula"; 
 
    //relaciones

#ejemplo
#En mi caso son donaciones.
    //public static $has_mani = [["ingresos"], ["gastos"]];

    public function mapperEntityToModel() : UsuarioModel {
        $usuarioModel = new UsuarioModel(
            username: $this->username,
            password: $this->password,
            nombre: $this->nombre,
            apellidos: $this->apellidos,
            rol: $this->rol,
            cedula: $this->cedula,
            email: $this->email,
            telefono: $this->telefono,
            estado: $this->estado,
            //fecha_registro: $this->fecha_registro,
        );

        $usuarioModel->setEmail($this->email);
        return $usuarioModel;
    }


    public static function mapperModelToEntity(UsuarioModel $usuarioModel) : UsuarioEntity{
        $usuarioEntity = new UsuarioEntity();
        $usuarioEntity->username = $usuarioModel->getUsername();
        $usuarioEntity->password = $usuarioModel->getPassword();
        $usuarioEntity->nombre = $usuarioModel->getNombre();
        $usuarioEntity->apellidos = $usuarioModel->getApellidos();
        $usuarioEntity->rol = $usuarioModel->getRol();
        $usuarioEntity->cedula = $usuarioModel->getCedula();
        $usuarioEntity->email = $usuarioModel->getEmail();
        $usuarioEntity->estado = $usuarioModel->getEstado();
        $usuarioEntity->telefono = $usuarioModel->getTelefono();
        //$usuarioEntity->fecha_registro = $usuarioModel->getFechaRegistro();
        return $usuarioEntity;
    }

}

?>
