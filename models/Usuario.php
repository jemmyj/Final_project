<?php

require_once("./models/conection.php");

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

                return '1';
            } else {
                return 'Credenciales inválidas. Inténtalo de nuevo.';
            }
        }
    }

    public function getUser($id_usuario)
    {
        $conectar = parent::conexion();
        parent::set_names();

        $sql = "SELECT * FROM usuarios WHERE id = $id_usuario";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }
}
