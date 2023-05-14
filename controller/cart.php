<?php
require_once("../models/conections.php");
require_once("../models/Productos.php");


$product = new Productos();

switch ($_GET["op"]) {
    case "delete_cart":
        $id = $_POST["id"];

        $product->delete_cart($id);
        break;
}
