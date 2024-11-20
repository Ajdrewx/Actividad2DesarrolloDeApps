<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/Actividad2DesarrollodeAPP/Domain/Model/UsuarioModel.php";

interface  IGuardarUsuarioService{
    public function guardarUsuario(UsuarioModel $usuario): int;
}