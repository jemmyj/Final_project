<!DOCTYPE html>
<html lang="es">


<?php session_start();

?>
<?php // Incluir el archivo Productos.php
require_once '../models/Productos.php';
require_once '../models/Usuario.php';
// Crear una instancia de la clase Productos
$productos = new Productos();



$filtro = $_GET['filtro'] ?? null;
// Obtener el número de la página actual
$pagina_actual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;

// Calcular el índice del primer producto a mostrar
$start = ($pagina_actual - 1) * 9;

// Obtener los datos de los productos
$resultado = $productos->listarProductosPorPaginasFiltro($start, $filtro);
/* $resultado = $productos->listarProductosPorPaginasFiltrados($start, $elementos_por_pagina, $filtro); */

// Definir la cantidad de elementos por página
$elementos_por_pagina = 9;

// Calcular el número total de páginas
$total_registros = $productos->pagination($filtro)[0]['total'];
//número total por páginas 
$total_paginas = ceil($total_registros / $elementos_por_pagina);
// página actual,
$pagina_actual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
// offset 
$offset = ($pagina_actual - 1) * $elementos_por_pagina;
//obtener resultado
$productos = $productos->limit_produc($offset, $elementos_por_pagina, $filtro);
/* $total_registros = $productos->paginationFiltrada($filtro)[0]['total'];
$total_paginas = ceil($total_registros / $elementos_por_pagina);
$offset = ($pagina_actual - 1) * $elementos_por_pagina;
$productos = $productos->limit_produc_filtrados($offset, $elementos_por_pagina, $filtro); */

?>

<head>
    <?php include '../config/MainHead.php';; ?>
</head>

<body>
    <div class="page-holder">
        <?php include '../config/MainHeader.php'; ?>
        <!-- <div class="modal fade" id="productView" tabindex="-1">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content overflow-hidden border-0">
                    <button class="btn-close p-4 position-absolute top-0 end-0 z-index-20 shadow-0" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="modal-body p-0">
                        <div class="row align-items-stretch">
                            <div class="col-lg-6 p-lg-0"><a class="glightbox product-view d-block h-100 bg-cover bg-center" style="background: url(img/product-5.jpg)" href="img/product-5.jpg" data-gallery="gallery1" data-glightbox="Red digital smartwatch"></a><a class="glightbox d-none" href="img/product-5-alt-1.jpg" data-gallery="gallery1" data-glightbox="Red digital smartwatch"></a><a class="glightbox d-none" href="img/product-5-alt-2.jpg" data-gallery="gallery1" data-glightbox="Red digital smartwatch"></a></div>
                            <div class="col-lg-6">
                                <div class="p-4 my-md-4">
                                    <ul class="list-inline mb-2">
                                        <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
                                        <li class="list-inline-item m-0 1"><i class="fas fa-star small text-warning"></i></li>
                                        <li class="list-inline-item m-0 2"><i class="fas fa-star small text-warning"></i></li>
                                        <li class="list-inline-item m-0 3"><i class="fas fa-star small text-warning"></i></li>
                                        <li class="list-inline-item m-0 4"><i class="fas fa-star small text-warning"></i></li>
                                    </ul>
                                    <h2 class="h4">Red digital smartwatch</h2>
                                    <p class="text-muted">$250</p>
                                    <p class="text-sm mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ut ullamcorper leo, eget euismod orci. Cum sociis natoque penatibus et magnis dis parturient montes nascetur ridiculus mus. Vestibulum ultricies aliquam convallis.</p>
                                    <div class="row align-items-stretch mb-4 gx-0">
                                        <div class="col-sm-7">
                                            <div class="border d-flex align-items-center justify-content-between py-1 px-3"><span class="small text-uppercase text-gray mr-4 no-select">Quantity</span>
                                                <div class="quantity">
                                                    <button class="dec-btn p-0"><i class="fas fa-caret-left"></i></button>
                                                    <input class="form-control border-0 shadow-0 p-0" type="text" value="1">
                                                    <button class="inc-btn p-0"><i class="fas fa-caret-right"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-5"><a class="btn btn-dark btn-sm w-100 h-100 d-flex align-items-center justify-content-center px-0" href="cart.html">Add to cart</a></div>
                                    </div>
                                    <a class="btn btn-link text-dark text-decoration-none p-0" href="#!"><i class="far fa-heart me-2"></i>Add to wish list</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <div class="container">
            <!-- HERO SECTION-->
            <section class="py-5 bg-light">
                <div class="container">
                    <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
                        <div class="col-lg-6">
                            <h1 class="h2 text-uppercase mb-0">Shop</h1>
                        </div>
                        <div class="col-lg-6 text-lg-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-lg-end mb-0 px-0 bg-light">
                                    <li class="breadcrumb-item"><a class="text-dark" href="/">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">shop</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </section>
            <section class="py-5">
                <div class="container p-0">
                    <div class="row">
                        <!-- SHOP SIDEBAR-->
                        <div class="col-lg-3 order-2 order-lg-1">
                            <h5 class="text-uppercase mb-4">Categories</h5>
                            <div class="py-2 px-4 bg-dark text-white mb-3"><strong class="small text-uppercase fw-bold">Fashion &amp; Sneakers</strong></div>
                            <ul class="list-unstyled small text-muted ps-lg-4 font-weight-normal">
                                <li class="mb-2"><a class="reset-anchor" href="#!">Nike</a></li>
                                <li class="mb-2"><a class="reset-anchor" href="#!">Adidas</a></li>
                                <li class="mb-2"><a class="reset-anchor" href="#!">Yeezy</a></li>
                                <li class="mb-2"><a class="reset-anchor" href="#!">Air Jordan</a></li>
                            </ul>
                            <h6 class="text-uppercase mb-4">Price range</h6>
                            <div class="price-range pt-4 mb-5">
                                <div id="range"></div>
                                <div class="row pt-2">
                                    <div class="col-6"><strong class="small fw-bold text-uppercase">From</strong></div>
                                    <div class="col-6 text-end"><strong class="small fw-bold text-uppercase">To</strong></div>
                                </div>
                            </div>
                        </div>
                        <!-- SHOP LISTING-->
                        <div class="col-lg-9 order-1 order-lg-2 mb-5 mb-lg-0">
                            <div class="row mb-3 align-items-center">
                                <div class="col-lg-6 mb-2 mb-lg-0">
                                    <!-- <p class="text-sm text-muted mb-0">Showing 1–12 of 53 results</p> -->
                                </div>
                                <div class="col-lg-6">
                                    <ul class="list-inline d-flex align-items-center justify-content-lg-end mb-0">
                                        <!-- <li class="list-inline-item text-muted me-3"><a class="reset-anchor p-0" href="#!"><i class="fas fa-th-large"></i></a></li>
                                        <li class="list-inline-item text-muted me-3"><a class="reset-anchor p-0" href="#!"><i class="fas fa-th"></i></a></li> -->
                                        <li class="list-inline-item">
                                            <select class="selectpicker" id="selectpicker" name="selectpicker" data-customclass="form-control form-control-sm">
                                                <option value="default">Default sorting </option>
                                                <option value="popularity">Popularity </option>
                                                <option value="low-high">Price: Low to High </option>
                                                <option value="high-low">Price: High to Low </option>
                                            </select>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div id="tablaProductos">
                                <div class="row">
                                    <?php foreach ($resultado as $producto) { ?>
                                        <div class="col-lg-4 col-sm-6">
                                            <div class="product text-center">
                                                <div class="mb-3 position-relative">
                                                    <div class="badge text-white bg-<?php echo $producto['categoria']; ?>"></div>
                                                    <a class="d-block" href="detalle_producto.php?id=<?php echo $producto['id']; ?>">
                                                        <img class="img-fluid w-100" src="../public/img/<?php echo $producto['imagen']; ?>" alt="<?php echo $producto['nombre']; ?>">
                                                    </a>
                                                    <div class="product-overlay">
                                                        <ul class="mb-0 list-inline">
                                                            <!--  <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-outline-dark btn-add-favorites" data-product-id="<?php /* echo $producto['id']; */ ?> "><i class="far fa-heart" id="btn-favoritos"></i></a></li> -->
                                                            <!-- <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-dark" href="cart.php?id=<?php echo $producto['id']; ?>" id="add-to-cart-btn">Agregar al carrito</a></li> -->
                                                            <li class="list-inline-item mr-0"><a class="btn btn-sm btn-outline-dark" href="detalle_producto.php?id=<?php echo $producto['id']; ?>"><i class="fas fa-expand"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <h6><a class="reset-anchor" href="detalle_producto.php?id=<?php echo $producto['id']; ?>"><?php echo $producto['nombre']; ?></a></h6>
                                                <p class="small text-muted"><?php echo $producto['precio']; ?>€</p>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>


                            <!-- PAGINATION-->
                            <?php
                            echo '<nav aria-label="Page navigation example">';
                            echo '<ul class="pagination justify-content-center justify-content-lg-end">';

                            if ($pagina_actual > 1) {
                                echo '<li class="page-item mx-1"><a class="page-link" href="?pagina=' . ($pagina_actual - 1) . "&&filtro=" . $filtro . '" aria-label="Previous"><span aria-hidden="true">«</span></a></li>';
                            }

                            for ($i = 1; $i <= $total_paginas; $i++) {
                                if ($i == $pagina_actual) {
                                    echo '<li class="page-item mx-1 active"><a class="page-link" href="?pagina=' . $i . "&&filtro=" . $filtro . '">' . $i . '</a></li>';
                                } else {
                                    echo '<li class="page-item mx-1"><a class="page-link" href="?pagina=' . $i . "&&filtro=" . $filtro . '">' . $i . '</a></li>';
                                }
                            }

                            if ($pagina_actual < $total_paginas) {
                                echo '<li class="page-item ms-1"><a class="page-link" href="?pagina=' . ($pagina_actual + 1) . '" aria-label="Next"><span aria-hidden="true">»</span></a></li>';
                            }

                            echo '</ul>';
                            echo '</nav>';
                            ?>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <footer class="bg-dark text-white">
            <?php include '../config/MainFooter.php'; ?>
        </footer>
        <!-- JS -->
        <?php include '../config/MainJs.php'; ?>

        <!-- <script src="../index.js"></script> -->
        <script>
            var range = document.getElementById('range');
            noUiSlider.create(range, {
                range: {
                    'min': 0,
                    'max': 2000
                },
                step: 5,
                start: [100, 1000],
                margin: 300,
                connect: true,
                direction: 'ltr',
                orientation: 'horizontal',
                behaviour: 'tap-drag',
                tooltips: true,
                format: {
                    to: function(value) {
                        return '$' + value;
                    },
                    from: function(value) {
                        return value.replace('', '');
                    }
                }
            });
        </script>
    </div>
    <script src="shop.js"></script>
</body>

</html>