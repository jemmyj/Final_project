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
            $sub_array[] = '<p class="">' . $row["creado_en"] . '</p>';
            // BOTONES DE ACCIONES
            $sub_array[] = '<button type="button" id="' . $row["id"] . '" class="btn btn-primary btn-icon col-8 " data-target="#editar-personal-modal" data-toggle="modal" data-placement="top" title="Edit Product"><div><i class="fa fa-edit"></i></div></button> <button type="button" onClick="delete_product(' . $row["id"] . ');"  id="' . $row["id"] . '" class="btn btn-danger btn-icon col-8 mt-1" data-toggle="tooltip-primary" data-placement="top" title="Eliminate Product"><div><i class="fa-solid fa-xmark"></i></div></button>';


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
        $name = ucfirst($_POST["product-name"]);
        $price = $_POST["product-price"];
        $description = $_POST["description"];
        $file = $_POST["imagePath"];
        $categoria = $_POST["categoria"];

        $directorio = "../public/img/";

        // CAMINO FINAL HACIA DONDE SE DEBE COPIAR
        $archivoFinal = $directorio . basename($_FILES["file"]["name"]);

        if (move_uploaded_file($_FILES['file']['tmp_name'], $archivoFinal)) {

            // INSERTAMOS EN BBDD // 

            $nomImg = $_FILES['file']['name'];

            $product->insertProduct($name, $price, $description, $nomImg, $categoria);
        }


        break;

    case "delete_product":
        $id = $_POST["id"];
        $product->delete_product($id);

        break;
}
