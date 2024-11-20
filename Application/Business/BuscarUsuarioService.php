<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/Actividad2DesarrollodeAPP/Domain/Model/UsuarioModel.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Actividad2DesarrollodeAPP/Application/Contracts/IBuscarUsuarioService.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Actividad2DesarrollodeAPP/Application/Contracts/IUsuariosRepository.php";

class  BuscarUsuarioService implements IBuscarUsuarioService{
    
    private $usuarioRepository;

    public function __construct(IUsuariosRepository $usuarioRepository){
        $this->usuarioRepository = $usuarioRepository;
    }
  
    public function buscarUsuario(string $cedula): UsuarioModel{
        return $this->usuarioRepository->findByUsername($cedula);
    }
}