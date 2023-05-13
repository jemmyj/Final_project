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
    public function agregarCarrito($usuario_id, $producto_id, $cantidad)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "INSERT INTO `carritos_de_compras`( `usuario_id`, `producto_id`, `cantidad`, `creado_en`) VALUES ('$usuario_id','$producto_id','$cantidad',now())";

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

    public function insertToCart($idUsu, $producto_id, $talla)
    {
        $conectar = parent::conexion();
        parent::set_names();

        // Buscar una fila existente con el mismo producto_id y talla
        $sql_select = "SELECT * FROM `carritos_de_compras`
               WHERE `producto_id` = '$producto_id' AND `talla` = '$talla'";

        $resultado = $conectar->query($sql_select);
        if ($resultado->rowCount() > 0) {
            // La fila ya existe, así que actualiza la cantidad
            $sql_update = "UPDATE `carritos_de_compras`
                 SET `cantidad` = `cantidad` + 1
                 WHERE `producto_id` = '$producto_id' AND `talla` = '$talla'";
            $conectar->exec($sql_update);
        } else {
            // La fila no existe, así que inserta una nueva fila
            $sql_insert = "INSERT INTO `carritos_de_compras` (`usuario_id`, `producto_id`, `cantidad`, `talla`, `creado_en`)
                 VALUES ('$idUsu', '$producto_id', 1, '$talla', now())";
            $conectar->exec($sql_insert);
        }
    }
    public function listarCarrito()
    {
        $conectar = parent::conexion();
        parent::set_names();

        $sql = "SELECT * FROM `carritos_de_compras_products_`";

        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }
    public function precio_total()
    {
        $conectar = parent::conexion();
        parent::set_names();

        $sql = "SELECT * FROM `total_pago`";

        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }
    public function total_cantidad()
    {
        $conectar = parent::conexion();
        parent::set_names();

        $sql = "SELECT SUM(`cantidad`) AS `total_cantidad` FROM `carritos_de_compras`;";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }
    public function insertProduct($name, $price, $descripcion, $imagen, $categoria)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "INSERT INTO `productos`(`nombre`, `descripcion`, `precio`, `imagen`, `categoria`) VALUES ('$name','$descripcion','$price','$imagen','$categoria')";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }
    public function delete_product($id)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "DELETE FROM `productos`
                WHERE
                    id = $id";

        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }
}
