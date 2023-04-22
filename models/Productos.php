<?php

require_once("./models/conection.php");

class Productos extends Conectar
{

    public function listarProductos()
    {
        $conectar = parent::conexion();
        parent::set_names();

        $sql = "SELECT * FROM productos";

        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }
    public function insertarImagen($nomDoc, $clienteDoc, $categoriaDoc, $fechaActual)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "INSERT INTO `td_doc`(`nomDoc`, `cliente_Doc`, `idCategoria_Doc`, `fecAltaDoc`, `fecBajaDoc`, `fecModiDoc`) 
                VALUES ('$nomDoc',$clienteDoc,$categoriaDoc,'$fechaActual',null,null)";

        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }
}
