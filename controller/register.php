<?php
require_once("../models/conections.php");
require_once("../models/Usuario.php");


$usu = new Usuario();

switch ($_GET["op"]) {
    case "registrar":
        $usu_nom = $_POST["name"];
        $usu_correo = $_POST["correo"];
        $usu_contra = $_POST["contrasena"];

        $usu->insertarUsu($usu_nom, $usu_correo, $usu_contra);
        break;
}
