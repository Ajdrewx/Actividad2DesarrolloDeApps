<?php
class UsuarioModel {
    
    private $cedula;
    private $id;
    private $username;
    private $password;
    private $nombre;
    private $apellidos;
    private $rol;
    private $email;
    private $telefono;
    private $estado;
    //private $fecha_registro;

    //funcion

    // Constructor
    public function __construct($cedula, $password, $username, $nombre, $apellidos, $rol, $email, $telefono, $estado = 'activo') {
        if(empty(trim($nombre))){
            throw new InvalidArgumentException("El nombre es requerido");
        }
    
        $resultado = $this->ValidarClave($password); 
        if (!$resultado["resultado"]) {
            echo 'Valor de la contraseña: ' . $password; 
            throw new InvalidArgumentException($resultado["mensaje"]); 
        }
    
        if (is_array($cedula)) {
            throw new InvalidArgumentException("Cedula debe ser un string, no un array.");
        }
        
        $this->cedula = (string) $cedula; // Asegúrate de que esto sea un string
        $this->password = $password;
        $this->username = $username;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->rol = $rol;
        $this->email = $email;
        $this->telefono = $telefono;
        $this->estado = $estado;
        //$this->fecha_registro = $fecha_registro;
    }
    
    // public function __construct($cedula, $password, $username, $nombre, $apellidos, $rol, $email, $telefono, $estado = 'activo', $fecha_registro) {
    //     if(empty(trim($nombre))){
    //         throw new InvalidArgumentException("El nombre es requerido");
    //     }

        
    //     $resultado = $this->ValidarClave($password);
    //      if (!$resultado["resultado"]) {
    //         echo 'Valor de la contraseña: ' . $password;


    //          throw new InvalidArgumentException($resultado["mensaje"]);
    //      }
      

        
    //     $this->cedula = $cedula; 
    //     $this->password = $password;
    //     $this->username = $username;
    //     $this->nombre = $nombre;    
    //     $this->apellidos = $apellidos;
    //     $this->rol = $rol; 
    //     $this->email = $email;
    //     $this->telefono = $telefono;
    //     $this->estado = $estado;
    //     $this->fecha_registro = $fecha_registro;
    // }

    private function ValidarClave(String $password): array {
        if (empty(trim($password))) {
            $mensaje = "la clave es requerida";
            return array ("resultado"=> false, "mensaje" => $mensaje);
        }
        if (strlen($password) <= 5) {
            $mensaje = "la clave debe ser mayor que 5<br>";
            return array("resultado"=> false, "mensaje" => $mensaje );
        }
        return array("resultado"=> true, "mensaje" => "clave Ok");
    }
    
    

    // Métodos getters
    public function getId() {
        return $this->id;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getApellidos() {
        return $this->apellidos;
    }

    public function getRol() {
        return $this->rol;
    }


    public function getCedula(): string {
        // Confirma que esto siempre devuelve un string, no un array
        if (is_array($this->cedula)) {
            // Si cedula es un array, convierte a string o maneja el error adecuadamente
            throw new TypeError("Expected a string, but got an array.");
        }
        return $this->cedula;
    }
    

    public function getEmail() {
        return $this->email;
    }

    public function getTelefono() {
        return $this->telefono;
    }

    public function getEstado() {
        return $this->estado;
    }

    // public function getFechaRegistro() {
    //     return $this->fecha_registro;
    // }


 
    // Métodos setters
    // public function setPassword($password) {
    //     $this->password = $password;
    // }

    // public function setNombre($nombre) {
    //     $this->nombre = $nombre;
    // }

    // public function setApellidos($apellidos) {
    //     $this->apellidos = $apellidos;
    // }

    // public function setRol($rol) {
    //     $this->rol = $rol;
    // }

     public function setEmail($email) {
         $this->email = $email;
     }


 
    // public function setTelefono($telefono) {
    //     $this->telefono = $telefono;
    // }

    // public function setEstado($estado) {
    //     $this->estado = $estado;
    // }
 
}
?>