<?php
require_once("../models/conections.php");
require_once("../models/Productos.php");


$product = new Productos();

switch ($_GET["op"]) {
    case "listarFiltro":

        $filtro = $_POST["selectedValue"];

        $product->filtro($filtro);
        break;
}
