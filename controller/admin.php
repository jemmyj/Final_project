<?php
require_once("../models/conections.php");
require_once("../models/Productos.php");


$product = new Productos();

switch ($_GET["op"]) {
    case "listarProductos":
        $datos = $product->listarProductos();
        $data = array();
        foreach ($datos as $row) {
            $sub_array = array();

            $sub_array[] = '<p class="">' . $row["id"] . '</p>';
            $sub_array[] = '<a href="../../public/img/' . $row["imagen"] . '" target="_blank"><img style="width:100%; height:100%" src="../../public/img/' . $row["imagen"] . '"></a>';
            $sub_array[] = '<p class="">' . $row["nombre"] . '</p>';
            $sub_array[] = '<p class="">' . $row["descripcion"] . '</p>';
            $sub_array[] = '<p class="">' . $row["precio"] . '</p>';
            $sub_array[] = '<p class="">' . $row["codigo"] . '</p>';
            $sub_array[] = '<p class="">' . $row["creado_en"] . '</p>';
            // BOTONES DE ACCIONES
            $sub_array[] = '<button type="button" onClick="editarProduct(' . $row["id"] . ')" id="' . $row["id"] . '" class="edit btn btn-primary btn-icon col-8 " data-target="#editar-product-modal" data-toggle="modal" data-placement="top" title="Edit Product"><div><i class="fa fa-edit"></i></div></button> <button type="button" onClick="delete_product(' . $row["id"] . ');"  id="' . $row["id"] . '" class="btn btn-danger btn-icon col-8 mt-1" data-toggle="tooltip-primary" data-placement="top" title="Eliminate Product"><div><i class="fa-solid fa-xmark"></i></div></button>';


            $data[] = $sub_array;
        }
        $results = array(
            "sEcho" => 1,
            "iTotalRecords" => count($data),
            "iTotalDisplayRecords" => count($data),
            "aaData" => $data
        );
        echo json_encode($results);


        break;

    case "insertarProduct":
        $name1 = ucfirst($_POST["product-name"]);
        $name = str_replace("'", '"', $name1);
        $price1 = $_POST["product-price"];
        $price = str_replace(",", '.', $price1);
        $description1 = addslashes($_POST["description"]);
        $description = str_replace("`", '', $description1);
        $codigo = strtoupper($_POST["codigo"]);
        $categoria = $_POST["categoria"];

        $directorio = "../public/img/";

        // Obtener el nombre del archivo y reemplazar los espacios por guiones bajos
        $nombreArchivo = str_replace(" ", "_", $_FILES['file']["name"]);

        // Escapar las comillas del nombre del archivo
        $nombreArchivo = str_replace("'", '', $nombreArchivo);

        // CAMINO FINAL HACIA DONDE SE DEBE COPIAR
        $archivoFinal = $directorio . basename($nombreArchivo);


        // Obtener el nombre del archivo y reemplazar los espacios por guiones bajos
        $nombreArchivo1 = str_replace(" ", "_", $_FILES['file']['tmp_name']);

        // Escapar las comillas del nombre del archivo
        $nombreArchivo1 = str_replace("'", '', $nombreArchivo1);

        if (move_uploaded_file($nombreArchivo1, $archivoFinal)) {

            // INSERTAMOS EN BBDD // 

            $nomImg = $nombreArchivo;

            $product->insertProduct($name, $price, $description, $nomImg, $codigo, $categoria);
        }


        break;

    case "delete_product":
        $id = $_POST["id"];
        $product->delete_product($id);

        break;

    case "editarProduct":
        $id = $_POST["id_product"];
        $name1 = ucfirst($_POST["product-nameE"]);
        $name = str_replace("'", '"', $name1);
        $price1 = $_POST["product-priceE"];
        $price = str_replace(",", '.', $price1);
        $description1 = addslashes($_POST["descriptionE"]);
        $description2 = str_replace("'", '', $description1);
        $description = str_replace("`", '', $description2);
        $codigo = strtoupper($_POST["codigoE"]);
        $categoria = $_POST["categoriaE"];

        $directorio = "../public/img/";

        // Obtener el nombre del archivo y reemplazar los espacios por guiones bajos
        $nombreArchivo = str_replace(" ", "_", $_FILES['fileE']["name"]);

        // Escapar las comillas del nombre del archivo
        $nombreArchivo = str_replace("'", '', $nombreArchivo);

        // CAMINO FINAL HACIA DONDE SE DEBE COPIAR
        $archivoFinal = $directorio . basename($nombreArchivo);

        // Si el archivo ya existe, mueve el archivo existente a la nueva ubicación
        if (file_exists($directorio . $nombreArchivo)) {
            if (rename($directorio . $nombreArchivo, $archivoFinal)) {
                $nomImg = $nombreArchivo;
            } else {
                // Error al mover el archivo existente
                $nomImg = '';
            }
        } else {
            // El archivo no existe, mueve el archivo recién subido a la nueva ubicación
            $nombreArchivo1 = str_replace(" ", "_", $_FILES['fileE']['name']);

            if (move_uploaded_file($_FILES['fileE']['tmp_name'], $archivoFinal)) {
                $nomImg = $nombreArchivo1;
            } else {
                // Error al mover el archivo recién subido
                $nomImg = '';
            }
        }

        // INSERTAMOS EN BBDD // 
        $product->actualizar_producto($id, $name, $price, $description, $nomImg, $codigo, $categoria);

        break;

    case "obtenerProduct":

        $id = $_POST['id'];
        $datos = $product->get_product_x_id($id);

        echo json_encode($datos);
        break;
}
