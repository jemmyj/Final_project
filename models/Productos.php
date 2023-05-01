<?php

require_once("conections.php");
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

    public function detalle_product($id)
    {
        $conectar = parent::conexion();
        parent::set_names();

        $sql = "SELECT * FROM productos WHERE id = $id";

        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    public function limit_produc($offset, $elementos_por_pagina)
    {
        $conectar = parent::conexion();
        parent::set_names();

        $sql = "SELECT * FROM productos LIMIT $offset, $elementos_por_pagina";

        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    public function pagination()
    {
        $conectar = parent::conexion();
        parent::set_names();

        $sql = "SELECT COUNT(*) AS total FROM productos";

        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }
}
