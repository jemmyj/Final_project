<?php

require_once("conections.php");

class Usuario extends Conectar
{

    public function login($usu_correo, $usu_pass)
    {
        $conectar = parent::conexion();
        parent::set_names();

        $correo = strtolower($usu_correo);
        $pass = $usu_pass;

        if (empty($correo) or empty($pass)) {
            return 'Campos vacios';
        } else {

            // $sql = "SELECT * FROM tm_usuario WHERE emailUsuario = '$correo' and senaUsuario = '$pass' and estUsu=1";
            $sql = "SELECT * FROM usuarios WHERE correo = '$correo' AND contrasena = '$pass'";
            $sql = $conectar->prepare($sql);
            $sql->execute();
            $resultado = $sql->fetch();

            if (is_array($resultado) and count($resultado) > 0) {

                session_start();

                $_SESSION['usu_id'] = $resultado['id'];
                $_SESSION['usu_nom'] = $resultado['nombre'];
                $_SESSION['usu_email'] = $resultado['correo'];
                $_SESSION['cant_likes'] = $resultado['likes'];
                $_SESSION['usu_rol'] = $resultado['rol'];

                return '1';
            } else {
                return 'Credenciales inválidas. Inténtalo de nuevo.';
            }
        }
    }

    public function getUser($id)
    {

        $conectar = parent::conexion();
        parent::set_names();


        $sql = "SELECT * FROM usuarios WHERE id =  $id";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        $resultado = $sql->fetch(PDO::FETCH_ASSOC);
        return  $resultado;
    }


    public function getLikes($id)
    {
        $conectar = parent::conexion();
        parent::set_names();

        $sql = "SELECT likes FROM usuarios WHERE id = $id";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        $resultado = $sql->fetch(PDO::FETCH_ASSOC);

        return $resultado;
    }

    public function updateLikes($id, $likes)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "UPDATE `usuarios` SET `likes`='$likes' WHERE `id` ='$id' ";

        $sql = $conectar->prepare($sql);
        $sql->execute();
    }
    public function insertarUsu($usuario_id, $producto_id, $cantidad)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "INSERT INTO `usuarios`( `nombre`, `correo`, `contrasena`, `creado_en`) VALUES ('$usuario_id','$producto_id','$cantidad',now())";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    public function getIndex($numero)
    {
        if ($numero == 2) {
            return 2;
        }
    }
    public function guardarEdiar($id, $nombre, $correo, $contrasena)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = " UPDATE `usuarios` SET `nombre`='$nombre',`correo`='$correo',`contrasena`='$contrasena',`actualizado_en`= now() WHERE `id` ='$id' ";
        $sql = $conectar->prepare($sql);
        $sql->execute();
    }
}
