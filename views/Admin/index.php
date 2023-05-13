<!DOCTYPE html>
<html lang="es">

<?php
session_start();


require_once("../../models/Usuario.php");


// Crear una instancia de la clase Productos
$usuarios = new Usuario();
$id_usuario = $_SESSION['usu_id']; // obtener el id del usuario guardado en la sesión

?>

<head>
    <?php include '../../config/MainHead.php'; ?>
    <script src="https://cdn.tiny.cloud/1/zu02gvsz5jbr3wl83c20x6mxnw8h97w8xky98t9uax1py8xw/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
</head>

</head>

<body>
    <div class="page-holder">
        <?php include '../../config/MainHeader.php'; ?>
        <div class="container">
            <section class="py-5 bg-light">
                <div class="container">
                    <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
                        <div class="col-lg-6">
                            <h1 class="h2 text-uppercase mb-0">Cart</h1>
                        </div>
                        <div class="col-lg-6 text-lg-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-lg-end mb-0 px-0 bg-light">
                                    <li class="breadcrumb-item"><a class="text-dark" href="index.html">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Cart</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </section>
            <section class="py-5">
                <div class="col-sm-12 col-md-12 col-lg-12 align-items-center d-lg-flex justify-content-lg-end mb-3">
                    <div class="text-center">
                        <button type="button" class="btn btn-outline-primary mb-lg-0 mb-3">
                            Add Product
                        </button>
                    </div>
                </div>
                <div class="modal mt-5" tabindex="-1" role="dialog" id="myModal">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Add Product</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="insertar-product-form" method="POST">
                                    <label for="product-name">Product Name:</label>
                                    <input type="text" id="product-name" name="product-name"><br><br>
                                    <label for="product-price">Price:</label>
                                    <input type="text" id="product-price" name="product-price"><br><br>
                                    <label for="categoria">Categoria:</label>
                                    <input type="text" id="categoria" name="categoria"><br><br>
                                    <label for="description">Description:</label>
                                    <textarea id="description" name="description"></textarea><br><br>
                                    <label for="file">Selecciona una imagen:</label>
                                    <input type="file" name="file"><br><br>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-dark waves-effect" id="cancel-btn" data-dismiss="modal">Cerrar</button>
                                        <button type="submit" class="btn btn-success waves-effect waves-light">Guardar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="admin_table" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Imagen</th>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Precio</th>
                                <th>Fecha creada</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                    </table>
                </div>
        </div>
        </section>
        <footer class="bg-dark text-white">
            <?php include '../../config/MainFooter.php'; ?>
        </footer>
        <!-- JS -->
        <?php include '../../config/MainJs.php'; ?>
    </div>
    <script src="admin.js"></script>

</body>

</html>