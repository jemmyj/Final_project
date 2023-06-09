<!DOCTYPE html>
<html lang="es">


<?php
require_once '../models/Usuario.php';
require_once '../models/Productos.php';
session_start();
// Crear una instancia de la clase Productos
$productos = new Productos();

// Obtener los datos de los productos
$resultado = $productos->detalle_product($_GET["id"]);


?>

<head>
    <?php include '../config/MainHead.php';; ?>
</head>

<body>
    <div class="page-holder">
        <?php include '../config/MainHeader.php'; ?>
        <!--  Modal -->
        <div class="modal fade" id="productView" tabindex="-1">
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
                                    </div><a class="btn btn-link text-dark text-decoration-none p-0" href="#!"><i class="far fa-heart me-2"></i>Add to wish list</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section class="py-5">
            <?php foreach ($resultado as $producto) { ?>
                <div class="container">
                    <div class="row mb-5">

                        <div class="col-lg-6">
                            <!-- PRODUCT SLIDER-->

                            <div class="row m-sm-0">
                                <!-- IMAGE SLIDER -->
                                <!-- <div class="col-sm-2 p-sm-0 order-2 order-sm-1 mt-2 mt-sm-0 px-xl-2">
                                    <div class="swiper product-slider-thumbs">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide h-auto swiper-thumb-item mb-3"><img class="w-100" src="img/product-detail-1.jpg" alt="..."></div>
                                            <div class="swiper-slide h-auto swiper-thumb-item mb-3"><img class="w-100" src="img/product-detail-2.jpg" alt="..."></div>
                                            <div class="swiper-slide h-auto swiper-thumb-item mb-3"><img class="w-100" src="img/product-detail-3.jpg" alt="..."></div>
                                            <div class="swiper-slide h-auto swiper-thumb-item mb-3"><img class="w-100" src="img/product-detail-4.jpg" alt="..."></div>
                                        </div>
                                    </div>
                                </div> -->
                                <div class="col-sm-10 order-1 order-sm-2">
                                    <div class="swiper product-slider">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide h-auto"><a class="glightbox product-view" href="../public/img/<?php echo $producto['imagen']; ?>" data-gallery="gallery2" data-glightbox="Product item 1"><img class="img-fluid" src="../public/img/<?php echo $producto['imagen']; ?>" alt="..."></a></div>
                                            <!-- <div class="swiper-slide h-auto"><a class="glightbox product-view" href="img/product-detail-2.jpg" data-gallery="gallery2" data-glightbox="Product item 2"><img class="img-fluid" src="img/product-detail-2.jpg" alt="..."></a></div>
                                            <div class="swiper-slide h-auto"><a class="glightbox product-view" href="img/product-detail-3.jpg" data-gallery="gallery2" data-glightbox="Product item 3"><img class="img-fluid" src="img/product-detail-3.jpg" alt="..."></a></div>
                                            <div class="swiper-slide h-auto"><a class="glightbox product-view" href="img/product-detail-4.jpg" data-gallery="gallery2" data-glightbox="Product item 4"><img class="img-fluid" src="img/product-detail-4.jpg" alt="..."></a></div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- PRODUCT DETAILS-->
                        <div class="col-lg-6">

                            <!-- <ul class="list-inline mb-2 text-sm">
                                <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
                                <li class="list-inline-item m-0 1"><i class="fas fa-star small text-warning"></i></li>
                                <li class="list-inline-item m-0 2"><i class="fas fa-star small text-warning"></i></li>
                                <li class="list-inline-item m-0 3"><i class="fas fa-star small text-warning"></i></li>
                                <li class="list-inline-item m-0 4"><i class="fas fa-star small text-warning"></i></li>
                            </ul> -->
                            <input type="hidden" id="usuId" name="usuId" value="<?php if ($_SESSION) {
                                                                                    echo $_SESSION["usu_id"];
                                                                                } ?>"> </input>
                            <h1><?php echo $producto['nombre']; ?></h1>
                            <p class="text-muted lead"><?php echo $producto['precio'] . '€'; ?></p>
                            <!-- <p class="text-sm mb-4"></p> -->
                            <div class="row align-items-stretch mb-4">
                                <div class="col-sm-5 pr-sm-0">
                                    <div class="border d-flex align-items-center justify-content-between py-1 px-3 bg-white border-white">
                                        <span class="small text-uppercase text-gray mr-4 no-select">Size</span>
                                        <div class="quantity">
                                            <button class="dec-btn p-0" onclick="decrementValue()"><i class="fas fa-caret-left"></i></button>
                                            <select class="form-control border-0 shadow-0 p-0 text-center" id="size-select">
                                                <option value="0" selected disabled>Choose your size</option>
                                                <option value="36">36</option>
                                                <option value="37">37</option>
                                                <option value="38">38</option>
                                                <option value="39">39</option>
                                                <option value="40">40</option>
                                                <option value="41">41</option>
                                                <option value="42">42</option>
                                                <option value="43">43</option>
                                                <option value="44">44</option>
                                                <option value="45">45</option>
                                            </select>
                                            <button class="inc-btn p-0" onclick="incrementValue()"><i class="fas fa-caret-right"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3 pl-sm-0"><a class="btn btn-dark btn-sm btn-block h-100 d-flex align-items-center justify-content-center px-0" onClick="verifyUser(<?php echo $producto["id"]; ?>)">Add to cart</a></div>
                            </div>
                            <!-- <a class="text-dark p-0 mb-4 d-inline-block" href="#!"><i class="far fa-heart me-2"></i>Add to wish list</a><br> -->
                            <ul class="list-unstyled small d-inline-block">
                                <li class="px-3 py-2 mb-1 bg-white"><strong class="text-uppercase">SKU:</strong><span class="ms-2 text-muted"><?php echo $producto['codigo']; ?></span></li>
                                <li class="px-3 py-2 mb-1 bg-white text-muted"><strong class="text-uppercase text-dark">Category:</strong><a class="reset-anchor ms-2" href="#!"><?php echo $producto['categoria']; ?></a></li>
                                <!-- <li class="px-3 py-2 mb-1 bg-white text-muted"><strong class="text-uppercase text-dark">Tags:</strong><a class="reset-anchor ms-2" href="#!">Innovation</a></li> -->
                            </ul>
                        </div>

                    </div>
                    <!-- DETAILS TABS-->
                    <ul class="nav nav-tabs border-0" id="myTab" role="tablist">
                        <li class="nav-item"><a class="nav-link text-uppercase active" id="description-tab" data-bs-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">Description</a></li>
                        <li class="nav-item"><a class="nav-link text-uppercase" id="reviews-tab" data-bs-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Reviews</a></li>
                    </ul>
                    <div class="tab-content mb-5" id="myTabContent">
                        <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                            <div class="p-4 p-lg-5 bg-white">
                                <h6 class="text-uppercase">Product description </h6>
                                <p class="text-muted text-sm mb-0"><?php echo $producto['descripcion']; ?></p>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                            <div class="p-4 p-lg-5 bg-white">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="d-flex mb-3">
                                            <div class="ms-3 flex-shrink-1">
                                                <h6 class="mb-0 text-uppercase">Jason Doe</h6>
                                                <p class="small text-muted mb-0 text-uppercase">20 May 2020</p>
                                                <ul class="list-inline mb-1 text-xs">
                                                    <li class="list-inline-item m-0"><i class="fas fa-star text-warning"></i></li>
                                                    <li class="list-inline-item m-0"><i class="fas fa-star text-warning"></i></li>
                                                    <li class="list-inline-item m-0"><i class="fas fa-star text-warning"></i></li>
                                                    <li class="list-inline-item m-0"><i class="fas fa-star text-warning"></i></li>
                                                    <li class="list-inline-item m-0"><i class="fas fa-star-half-alt text-warning"></i></li>
                                                </ul>
                                                <p class="text-sm mb-0 text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <div class="col-8 p-lg-5">
                <a href="shop.php?pagina=1" class="btn btn-dark btn-sm">Back to shop</a>
            </div>
        </section>

        <footer class="bg-dark text-white">
            <?php include '../config/MainFooter.php'; ?>
        </footer>
        <!-- JS -->
        <?php include '../config/MainJs.php'; ?>
        <script>
            // ------------------------------------------------------- //
            //   Inject SVG Sprite - 
            //   see more here 
            //   https://css-tricks.com/ajaxing-svg-sprite/
            // ------------------------------------------------------ //
            function injectSvgSprite(path) {

                var ajax = new XMLHttpRequest();
                ajax.open("GET", path, true);
                ajax.send();
                ajax.onload = function(e) {
                    var div = document.createElement("div");
                    div.className = 'd-none';
                    div.innerHTML = ajax.responseText;
                    document.body.insertBefore(div, document.body.childNodes[0]);
                }
            }
            // this is set to BootstrapTemple website as you cannot 
            // inject local SVG sprite (using only 'icons/orion-svg-sprite.svg' path)
            // while using file:// protocol
            // pls don't forget to change to your domain :)
            injectSvgSprite('https://bootstraptemple.com/files/icons/orion-svg-sprite.svg');
        </script>
        <!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-HeyPm+7czr6UlDVs3XPYZ3s3HQcnAVVfLvNEQ4J50EAgbBxrS99+F0tTcSlBd+q/" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-Vi/2WyirAt62eyzlqC9rRLrFflnCpgJVPp8OkwWnRvN0Qo6BztMtd1/+3qX9rKP05Ng0Br1EnpO+8hxjRkjLZQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="../views/detalle.js"></script>
</body>

</html>