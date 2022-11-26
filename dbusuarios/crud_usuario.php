<?php
require_once('conexion.php');
require_once('usuario.php');

class CrudUsuario{

    public function __construct(){}

    //insertar los datos del usuario
    public function insertar($usuario){
        $db=DB::conectar();
        $insert=$db->prepare('INSERT INTO usuario VALUES(NULL, :nombre, :correo, :usuario, :clave)');
        $insert->bindValue('nombre', $usuario->getNombre());
        $insert->bindValue('correo', $usuario->getCorreo());
        $insert->bindValue('usuario', $usuario->getUsuario());

        
        //encripta contraseña
        $pass=password_hash($usuario->getClave(), PASSWORD_DEFAULT);
        $insert->bindValue('clave', $pass);
        $insert->execute();
        header("Location:../home.html");
    }

    
    public function obtenerUsuario($usuario, $clave){
        $db=DB::conectar();
        $select=$db->prepare('SELECT * FROM usuario WHERE usuario=:usuario');
        $select->bindValue('usuario', $usuario);
        $select->execute();
        $registro = $select->fetch();
        $usuario = new Usuario();
        //verificar si la clave es correcta
        if (password_verify($clave, $registro['clave'])){
            //si es correcta, asigna los valores que trae desde la base de datos
            $usuario->setId($registro['id']);
            $usuario->setNombre($registro['nombre']);
            $usuario->setUsuario($registro['usuario']);
            $usuario->setCorreo($registro['correo']);
            $usuario->setClave($registro['clave']);
        }
        return $usuario;
    }

    //busca el nombre del usuario si existe
    public function buscarUsuario($usuario){
        $db=DB::conectar();
        $select=$db->prepare('SELECT * FROM usuario WHERE usuario=:usuario');
        $select->bindValue('usuario', $usuario);
        $select->execute();
        $registro=$select->fetch();
        if($registro['id']!=NULL){
            $usado=False;
        }else{
            $usado=True;
        }
        return $usado;
    }

    public function numeroUsuarios(){
        $db=DB::conectar();
        $select=$db->prepare('SELECT COUNT(fullname) FROM usuario');
        return $select;
    }
    
    public function eliminarUsuario(){
        $sql = "DELETE FROM usuario WHERE id=:id";
        $sql = $con->prepare("DELETE FROM usuario WHERE id=:id");
        $sql->execute(array(':id' => $id));
        return $sql;
    }
}