<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/Actividad2DesarrollodeAPP/Domain/Model/UsuarioModel.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Actividad2DesarrollodeAPP/Application/Contracts/IUsuariosRepository.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Actividad2DesarrollodeAPP/Application/Execptions/EntityNotFoundException.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Actividad2DesarrollodeAPP/Application/Execptions/EntityPreexistingException.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Actividad2DesarrollodeAPP/Infrastructure/Databases/Entities/UsuarioEntity.php";

class UsuarioRepository implements IUsuariosRepository{
    
    public function create(UsuarioModel $usuarioModel): int {
    try {
        $cedula = $usuarioModel->getCedula();
        $usuario = $this->findByCedula($cedula);
        if ($usuario !== null) {
            $message = "usuario con cedula " . $cedula . " ya existe";
            throw new EntityPreexistingException($message);
        }
        return 0;
    } catch(EntityNotFoundException $e) {
        $usuario = new UsuarioEntity();
        $usuario->cedula = $cedula;
        $usuario->username = $usuarioModel->getUsername();
        $usuario->password = $usuarioModel->getPassword();
        $usuario->nombre = $usuarioModel->getNombre();
        $usuario->apellidos = $usuarioModel->getApellidos();
        $usuario->rol = $usuarioModel->getRol();
        $usuario->email = $usuarioModel->getEmail();
        $usuario->telefono = $usuarioModel->getTelefono();
        $usuario->estado = $usuarioModel->getEstado();
        //$usuario->fecha_registro = $usuarioModel->getFechaRegistro();

        $usuario->save();
        return $this->count();
    } catch(EntityPreexistingException $e) {
        throw $e;
    }



    
}
    
// public function findByUsername(string $username): ?UsuarioModel {
//     try {
//         // Buscar el usuario por nombre de usuario
//         $usuarioEntity = UsuarioEntity::find(['username' => $username]);
        
//         if (!$usuarioEntity) {
//             // Si no se encuentra, devolver null
//             return null;
//         }

//         // Retornar el modelo del usuario
//         return $usuarioEntity->mapperEntityToModel();
//     } catch (Exception $e) {
//         throw new EntityNotFoundException("Error al buscar el usuario con nombre de usuario $username: " . $e->getMessage());
//     }
// }

    

    // public function create(UsuarioModel $usuarioModel): int {
    //     try{
    //         $usuario = $this->findByCedula($usuarioModel->getCedula());
    //          if ($usuario !== null) {
    //             $menssage = "usuario con cedula ".$usuarioModel->getCedula()."Ya existe";
    //              throw new EntityPreexistingException($menssage);
    //         }
    //         return 0;
    //     }catch(EntityNotFoundException $e){

    //     $usuario = new UsuarioEntity();
    //     $usuario->cedula = $usuarioModel->getCedula();
    //     $usuario->username = $usuarioModel->getUsername();
    //     $usuario->password = $usuarioModel->getPassword();
    //     $usuario->nombre = $usuarioModel->getNombre();
    //     $usuario->apellidos = $usuarioModel->getApellidos();
    //     $usuario->rol = $usuarioModel->getRol();
    //     $usuario->email = $usuarioModel->getEmail();
    //     $usuario->telefono = $usuarioModel->getTelefono();
    //     $usuario->estado = $usuarioModel->getEstado();
    //     $usuario->fecha_registro = $usuarioModel->getFechaRegistro();
    //     // Un insert?? 
    //     $usuario->save();
    //     return $this->count();
    //     }
    //     catch(EntityPreexistingException $e){
    //         throw $e;
    //     // $usuario->save();
    //     // $total = UsuarioEntity::count();
    //     // //assert
    //     // echo "Usuario guardado, Total: $total";
        
    //     }
    // }
    public function findByCedula(string $cedula): UsuarioModel {
        try {
            $usuario = UsuarioEntity::find_by_pk([$cedula], array());  // Pasar como array
            if (!$usuario) {
                throw new EntityNotFoundException("Usuario con cedula $cedula No existe");
            }
            return $usuario->mapperEntityToModel();
        } catch (Exception $e) {
            throw new EntityNotFoundException("Error al buscar el usuario con cedula $cedula: " . $e->getMessage());
        }
    }
    
    
    
    
    
    
    


    // public function findByCedula(String $cedula): UsuarioModel{
    //     try {
    //         // Otro sql
    //         $usuario = UsuarioEntity::find($cedula);
    //         return $usuario->mapperEntityToModel();
    //     } catch (Exception $e) {
    //         $message = "Usuario con  cedula: $cedula No existe";
    //         throw new EntityNotFoundException($message);
    //     } 
    // }

    public function count( ): int{
        return UsuarioEntity::count();
    }

    public function edit(UsuarioModel $usuarioModel):void{
        try{
            #$usuarioModel = $this->findByCedula(username: $usuarioModel->getUsername());
            $usuarioEntity = UsuarioEntity::find($usuarioModel->getUsername());
            $usuarioEntity = UsuarioEntity::mapperModelToEntity($usuarioModel);
            $usuarioEntity = new UsuarioEntity();
            $usuarioEntity->cedula = $usuarioModel->getCedula();
            $usuarioEntity->password = $usuarioModel->getPassword();
            $usuarioEntity->username = $usuarioModel->getUsername();
            $usuarioEntity->nombre = $usuarioModel->getNombre();
            $usuarioEntity->apellidos = $usuarioModel->getApellidos();
            $usuarioEntity->rol = $usuarioModel->getRol();
            $usuarioEntity->email = $usuarioModel->getEmail();
            $usuarioEntity->telefono = $usuarioModel->getTelefono();
            $usuarioEntity->estado = $usuarioModel->getEstado();
            //$usuarioEntity->fecha_registro = $usuarioModel->getFechaRegistro();
            $usuarioEntity->save();
        }catch(Exception $e){
                
                $menssage = "usuario con nickname ".$usuarioModel->getCedula()."Ya existe";
                throw new EntityNotFoundException($menssage);
            }

        }

    public function deleteByUsername(string $username){
        try{
            $usuarioEntity = UsuarioEntity::find($username);
            $usuarioEntity->delete();
        }catch(Exception $e){
            $menssage = "usuario de nick ".$username."No existe";
                throw new EntityNotFoundException($menssage);
        }
    }

    public function getAllUsuarios() : array{
        return $usuariosEntityList = UsuarioEntity::all();
        $usuariosModelist = [];
        foreach($usuariosEntityList as $usuariodB){
            $usuarioModel = $usuariodB->mapperEntityToModel();
            $usuariosModelList[] = $usuarioModel; 
        }
        return $usuariosModelist;
    }
    
    public function findByUsername(string $username): UsuarioModel {
        try{

            //$usuario = UsuarioEntity::find_by_pk([$username], array());
            $usuario = UsuarioEntity::find_by_username($username);
            //$usuario = UsuarioEntity::find([$username],array() );

            if (!$usuario) {
                throw new EntityNotFoundException("Usuario $usuario No existe");
            }
            return $usuario->mapperEntityToModel();

        } catch(Exception $e){
            throw new EntityNotFoundException("Error al buscar el usuario $usuario: " . $e->getMessage());
        }

    }
}
    
