<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/Actividad2DesarrollodeAPP/Domain/Model/UsuarioModel.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Actividad2DesarrollodeAPP/Application/Contracts/IGuardarUsuarioService.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Actividad2DesarrollodeAPP/Application/Contracts/IUsuariosRepository.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Actividad2DesarrollodeAPP/Application/Execptions/EntityPreexistingException.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Actividad2DesarrollodeAPP/Infrastructure/Repository/UsuarioRepository.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Actividad2DesarrollodeAPP/Application/Business/GuardarUsuarioService.php";

class UsuarioController {
    private $usuarioRepository;

    public function __construct(UsuarioRepository $usuarioRepository) {
        $this->usuarioRepository = $usuarioRepository;
    }

    public function actionExecute() {
        $accion = $_REQUEST["accion"];
        switch($accion) {
            case "GUARDAR":
                $this->guardarUsuario();
                break;
        }
    }

    public function guardarUsuario() {
        try {
            $cedula = $_POST["cedula"];
            $username = $_POST["username"];
            $password = $_POST["password"];
            $nombre = $_POST["nombre"];
            $apellido = $_POST["apellido"];
            $rol = $_POST["rol"];
            $email = $_POST["email"];
            $telefono = $_POST["telefono"];

            $usuarioModel = new UsuarioModel($cedula, $password, $username, $nombre, $apellido, $rol, $email, $telefono);
            $usuarioModel->setEmail($email);

            $guardarUsuarioService = new GuardarUsuarioService($this->usuarioRepository);
            $total = $guardarUsuarioService->guardarUsuario($usuarioModel);
            
            $message = "Usuario Guardado, Total: $total";
            header("Location: ../Views/Forms/Usuario/Create.php?message=$message");
            exit;  
        } catch (EntityPreexistingException $e) {
            $message = $e->getMessage();  
            header("Location: ../Views/Forms/Usuario/Create.php?message=$message");
            exit;  
        } catch (Exception $e) {
            $message = $e->getMessage();  
            header("Location: ../Views/Forms/Usuario/Create.php?message=$message");
            exit;  
        }
    }
}

$usuarioRepository = new UsuarioRepository();
$controlador = new UsuarioController($usuarioRepository);
$controlador->actionExecute();
 