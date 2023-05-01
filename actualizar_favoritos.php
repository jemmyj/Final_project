<?php

require_once("./models/Usuario.php");
session_start();
// Obtener el id del usuario y la cantidad de likes desde la petición AJAX
$usu_id = $_SESSION['usu_id'];

// Crear una instancia de la clase Usuario
$usuario = new Usuario();

// Actualizar la cantidad de likes del usuario en la base de datos
$usuario->updateLikes($usu_id, $usuario->getLikes($usu_id)['likes'] + 1);
