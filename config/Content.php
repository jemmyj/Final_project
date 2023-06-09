<?php // Incluir el archivo Productos.php
require_once './models/Productos.php';
require_once './models/Usuario.php';
// Crear una instancia de la clase Productos
$productos = new Productos();
// Obtener los datos de los productos
$resultado = $productos->listarProductosTop();
?>
<!--  Modal -->
<!-- <div class="modal fade" id="productView" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content overflow-hidden border-0">
            <button class="btn-close p-4 position-absolute top-0 end-0 z-index-20 shadow-0" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-0">
                <div class="row align-items-stretch">
                    <div class="col-lg-6 p-lg-0"><a class="glightbox product-view d-block h-100 bg-cover bg-center" style="background: url(img/product-5.jpg)" href="../public/img/adidas1.png/" data-gallery="gallery1" data-glightbox="Red digital smartwatch"></a><a class="glightbox d-none" href="img/product-5-alt-1.jpg" data-gallery="gallery1" data-glightbox="Red digital smartwatch"></a><a class="glightbox d-none" href="img/product-5-alt-2.jpg" data-gallery="gallery1" data-glightbox="Red digital smartwatch"></a></div>
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
                            </div><a class="btn btn-link text-dark text-decoration-none p-0" href="#!"><i class="far fa-heart me-2"></i>Add to wish list</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
<!-- HERO SECTION-->
<div class="container">
    <section class="hero pb-3 bg-cover bg-center d-flex align-items-center" style="background: url(../public/img/fondoPrincipal.jpeg);">
        <div class="container py-5">
            <div class="row px-4 px-lg-5">
                <div class="col-lg-6">
                    <p class="text-muted small text-uppercase mb-2" style="color: white; background: rgba(0, 0, 0, 0.1)">New Inspiration 2020</p>
                    <h2 class="h2 text-uppercase mb-3" style="color: white; background: rgba(0, 0, 0, 0.1)">20% off on new season</h2><a class="btn btn-dark" href="../views/shop.php?pagina=1">See more</a>
                </div>
            </div>
        </div>
    </section>
    <!-- CATEGORIES SECTION-->
    <section class="pt-5">
        <header class="text-center">
            <p class="small text-muted small text-uppercase mb-1">Carefully created collections</p>
            <h2 class="h5 text-uppercase mb-4">Browse our categories</h2>
        </header>
        <div class="row">
            <div class="col-12 col-md-4 col-sm-12 mb-5">
                <a class="category-item" href="../views/shop.php?pagina=1"><strong class="category-item-title">Sneakers</strong></a>
            </div>
            <div class="col-12 col-md-4 col-sm-12 mb-5">
                <a class="category-item" href="../views/shop.php?pagina=1"><strong class="category-item-title">Shoes</strong></a>
            </div>
            <div class="col-12 col-md-4 col-sm-12 mb-5">
                <a class="category-item" href="../views/shop.php?pagina=1"><strong class="category-item-title">Flip Flops</strong></a>
            </div>
        </div>
    </section>


    <!-- TRENDING PRODUCTS-->
    <section class="py-5">
        <header>
            <p class="small text-muted small text-uppercase mb-1">Made the hard way</p>
            <h2 class="h5 text-uppercase mb-4">Top trending products</h2>
        </header>
        <div class="row">
            <?php foreach ($resultado as $producto) { ?>
                <!-- PRODUCT-->
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="product text-center">
                        <div class="position-relative mb-3">
                            <!-- <div class="badge text-white bg-info">New</div> --><a class="d-block" href="../../views/detalle_producto.php?id=<?php echo $producto['id']; ?>"><img class="img-fluid w-100" src="../public/img/<?php echo $producto['imagen']; ?>" alt="<?php echo $producto['id']; ?>"></a>
                            <div class="product-overlay">
                                <ul class="mb-0 list-inline">
                                    <!-- <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-outline-dark" href="#!"><i class="far fa-heart"></i></a></li> -->
                                    <li class="list-inline-item mr-0"><a class="btn btn-sm btn-outline-dark" href="../views/detalle_producto.php?id= <?php echo $producto['id']; ?>"><i class="fas fa-expand"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <h6> <a class="reset-anchor" href="../../views/detalle_producto.php?id=<?php echo $producto['id']; ?>"><?php echo $producto['nombre']; ?></a></h6>
                        <p class="small text-muted"><?php echo $producto['precio']; ?> €</p>
                    </div>
                </div>
            <?php } ?>
        </div>
    </section>
    <!-- SERVICES-->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row text-center gy-3">
                <div class="col-lg-4">
                    <div class="d-inline-block">
                        <div class="d-flex">
                            <i class="fa-solid fa-truck-fast fa-2xl"></i>
                            <div class="text-start ms-3 align-items-end">
                                <h6 class="text-uppercase mb-1">Free shipping</h6>
                                <p class="text-sm mb-0 text-muted">Free shipping worldwide</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="d-inline-block">
                        <div class="d-flex">
                            <i class="fa-solid fa-clock fa-2xl"></i>
                            <div class="text-start ms-3">
                                <h6 class="text-uppercase mb-1 align-items-end">24 x 7 service</h6>
                                <p class="text-sm mb-0 text-muted">Serving all day</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="d-inline-block">
                        <div class="d-flex">
                            <i class="fa-solid fa-tag fa-2xl"></i>
                            <div class="text-start ms-3">
                                <h6 class="text-uppercase mb-1 align-items-end">Festivaloffers</h6>
                                <p class="text-sm mb-0 text-muted">We have discount</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- NEWSLETTER-->
    <section class="py-5">
        <div class="container p-0">
            <div class="row gy-3">
                <div class="col-lg-6">
                    <h5 class="text-uppercase">Let's be friends!</h5>
                    <p class="text-sm text-muted mb-0">Go to subscribe.</p>
                </div>
                <div class="col-lg-6">
                    <form method="post" action="" id="mail">
                        <div class="input-group">
                            <input class="form-control form-control-lg" type="email" placeholder="Enter your email address" aria-describedby="button-addon2" id="email" name="email">
                            <button class="btn btn-dark" id="button-addon2" type="submit">Subscribe</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>