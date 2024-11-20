<?php

 ini_set('display_errors', 0);
 ini_set('display_startup_errors', 0);
 error_reporting(0);

require_once $_SERVER["DOCUMENT_ROOT"] . "/Actividad2DesarrollodeAPP/Domain/Model/UsuarioModel.php"; 
require_once $_SERVER["DOCUMENT_ROOT"] . "/Actividad2DesarrollodeAPP/Application/Contracts/IUsuariosRepository.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Actividad2DesarrollodeAPP/Infrastructure/Repository/UsuarioRepository.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Actividad2DesarrollodeAPP/Application/Business/BuscarUsuarioService.php"; 

class LoginKodular
{
    private $usuarioRepository;

    public function __construct(UsuarioRepository $usuarioRepository)
    {
        $this->usuarioRepository = $usuarioRepository;
    }

    public function validarUsuario()
    {
        try {
                // $username = $_POST["username"];  
                // $password = $_POST["password"];  
                $username = "xandrewx";  
                $password = "12345678";  
            // Utilizando el servicio de búsqueda de usuario
            $buscarUsuarioservice = new BuscarUsuarioService($this->usuarioRepository);
            $usuario = $buscarUsuarioservice->buscarUsuario($username);

            if ($usuario) {
                // Verificando la contraseña utilizando password_verify
                if ($password == $usuario->getPassword()) {
                    // Si la contraseña es correcta, enviamos una respuesta de éxito
                    echo json_encode(["success" => true, "message" => "Inicio de sesión exitoso"]);
                } else {
                    // Si la contraseña es incorrecta
                    echo json_encode(["success" => false, "message" => "Usuario o contraseña incorrectos"]);
                }
            } else {
                // Si el usuario no se encuentra
                echo json_encode(["success" => false, "message" => "Usuario no encontrado"]);
            }

        } catch (Exception $e) {
            // Manejo de errores generales
            echo json_encode(["success" => false, "message" => "Error en la validación: " . $e->getMessage()]);
        }
    }
}

// Instanciamos el repositorio y el controlador
$usuarioRepository = new UsuarioRepository();
$controlador = new LoginKodular($usuarioRepository);
$controlador->validarUsuario();  

?>
