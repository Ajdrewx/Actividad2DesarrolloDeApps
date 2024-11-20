<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/Actividad2DesarrollodeAPP/Domain/Model/UsuarioModel.php";

interface  IBuscarUsuarioService{
    public function buscarUsuario(string $userName): UsuarioModel;
}