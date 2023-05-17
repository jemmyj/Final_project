<?php
require_once("../models/conections.php");
require_once("../models/Productos.php");


$product = new Productos();

switch ($_GET["op"]) {
    case "insertarToCart":
        $id = $_POST["id"];
        $idUsu = $_POST["idUsu"];
        $talla = $_POST["talla"];
        $product->insertToCart($idUsu, $id, $talla);
        break;
}
