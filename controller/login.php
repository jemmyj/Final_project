<?php
require_once("../models/conections.php");
require_once("../models/Usuario.php");


$usu = new Usuario();
session_start();
switch ($_GET["op"]) {
    case "guardarEdiar":
        $id = $_SESSION["usu_id"];
        $usu_nom = $_POST["nombre"];
        $usu_correo = $_POST["email"];
        $usu_contra = $_POST["contrasena"];

        $usu->guardarEdiar($id, $usu_nom, $usu_correo, $usu_contra);
        break;
}
