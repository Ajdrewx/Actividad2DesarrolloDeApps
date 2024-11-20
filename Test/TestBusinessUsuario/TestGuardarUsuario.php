<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/Actividad2DesarrollodeAPP/Domain/Model/UsuarioModel.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Actividad2DesarrollodeAPP/Application/Contracts/IGuardarUsuarioService.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Actividad2DesarrollodeAPP/Application/Business/GuardarUsuarioService.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Actividad2DesarrollodeAPP/Application/Contracts/IUsuariosRepository.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Actividad2DesarrollodeAPP/Application/Execptions/EntityPreexistingException.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Actividad2DesarrollodeAPP/Infrastructure/Repository/UsuarioRepository.php";


class testUsuario {

    public function eliminarusuario(){

    }

    public function testGuardarUsuarioDebeMostrarelTotalOError(): void {
        $cedula = '01';
        $username = "Cerouno01";
        $password = "000000000111111111";
        $nombre = "cero";
        $apellido = "uno";
        $rol = "Estudiante";
        $email = "cerouno@gmail.com";
        $telefono = "01";
        $estado = "activo";
        #$fecha_registro = "2024-10-14";

        $usuarioModel = new UsuarioModel(
            $cedula,  // String
            $password,
            $username,
            $nombre,
            $apellido,
            $rol,
            $email,
            $telefono,
            $estado,
            #$fecha_registro
        );

        $usuarioModel->setEmail($email);
        $usuarioRepository = new UsuarioRepository();
        $guardarUsuarioService = new GuardarUsuarioService($usuarioRepository);

        try {
            $total = $guardarUsuarioService->guardarUsuario($usuarioModel);
            echo "TOTAL USERS: $total";
        } catch (EntityPreexistingException $e) {
            echo $e->getMessage();
        }
    }
}

$testUsuario = new testUsuario();
$testUsuario->testGuardarUsuarioDebeMostrarelTotalOError();
