<!DOCTYPE html>
<html>


<?php

require_once '../../models/Usuario.php';
require_once '../../models/Productos.php';
session_start();
// Crear una instancia de la clase Productos
$productos = new Productos();

// Obtener los datos de los productos
$resultado = $productos->listarCarrito($_SESSION["usu_id"]);
//precio total
$precio_total = $productos->precio_total();
$precio = $precio_total[0]["total"];
?>

<head>
  <?php include '../../config/MainHead.php'; ?>
</head>

<body>
  <div class="page-holder">
    <!-- navbar-->
    <?php include '../../config/MainHeader.php'; ?>
    <!--  Modal -->
    <div class="container">
      <!-- HERO SECTION-->
      <section class="py-5 bg-light">
        <div class="container">
          <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
            <div class="col-lg-6">
              <h1 class="h2 text-uppercase mb-0">Cart</h1>
            </div>
            <div class="col-lg-6 text-lg-end">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-lg-end mb-0 px-0 bg-light">
                  <li class="breadcrumb-item"><a class="text-dark" href="/">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Cart</li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </section>
      <!-- <section class="py-5">
        <h2 class="h5 text-uppercase mb-4">Shopping cart</h2>
        <div class="row">
          <div class="col-lg-8 mb-4 mb-lg-0"> -->
      <!-- CART TABLE-->
      <!-- <div class="table-responsive mb-4">
              <table class="table text-nowrap">
                <thead class="bg-light">
                  <tr>
                    <th class="border-0 p-3" scope="col"> <strong class="text-sm text-uppercase">Product</strong></th>
                    <th class="border-0 p-3" scope="col"> <strong class="text-sm text-uppercase">Price</strong></th>
                    <th class="border-0 p-3" scope="col"> <strong class="text-sm text-uppercase">Quantity</strong></th>
                    <th class="border-0 p-3" scope="col"> <strong class="text-sm text-uppercase">Total</strong></th>
                    <th class="border-0 p-3" scope="col"> <strong class="text-sm text-uppercase"></strong></th>
                  </tr>
                </thead>
                <tbody class="border-0">
                  <tr>
                    <th class="ps-0 py-3 border-light" scope="row">
                      <div class="d-flex align-items-center"><a class="reset-anchor d-block animsition-link" href="detail.html"><img src="img/product-detail-3.jpg" alt="..." width="70" /></a>
                        <div class="ms-3"><strong class="h6"><a class="reset-anchor animsition-link" href="detail.html">Red digital smartwatch</a></strong></div>
                      </div>
                    </th>
                    <td class="p-3 align-middle border-light">
                      <p class="mb-0 small">$250</p>
                    </td>
                    <td class="p-3 align-middle border-light">
                      <div class="border d-flex align-items-center justify-content-between px-3"><span class="small text-uppercase text-gray headings-font-family">Quantity</span>
                        <div class="quantity">
                          <button class="dec-btn p-0"><i class="fas fa-caret-left"></i></button>
                          <input class="form-control form-control-sm border-0 shadow-0 p-0" type="text" value="1" />
                          <button class="inc-btn p-0"><i class="fas fa-caret-right"></i></button>
                        </div>
                      </div>
                    </td>
                    <td class="p-3 align-middle border-light">
                      <p class="mb-0 small">$250</p>
                    </td>
                    <td class="p-3 align-middle border-light"><a class="reset-anchor" href="#!"><i class="fas fa-trash-alt small text-muted"></i></a></td>
                  </tr>
                  <tr>
                    <th class="ps-0 py-3 border-0" scope="row">
                      <div class="d-flex align-items-center"><a class="reset-anchor d-block animsition-link" href="detail.html"><img src="img/product-detail-2.jpg" alt="..." width="70" /></a>
                        <div class="ms-3"><strong class="h6"><a class="reset-anchor animsition-link" href="detail.html">Apple watch</a></strong></div>
                      </div>
                    </th>
                    <td class="p-3 align-middle border-0">
                      <p class="mb-0 small">$250</p>
                    </td>
                    <td class="p-3 align-middle border-0">
                      <div class="border d-flex align-items-center justify-content-between px-3"><span class="small text-uppercase text-gray headings-font-family">Quantity</span>
                        <div class="quantity">
                          <button class="dec-btn p-0"><i class="fas fa-caret-left"></i></button>
                          <input class="form-control form-control-sm border-0 shadow-0 p-0" type="text" value="1" />
                          <button class="inc-btn p-0"><i class="fas fa-caret-right"></i></button>
                        </div>
                      </div>
                    </td>
                    <td class="p-3 align-middle border-0">
                      <p class="mb-0 small">$250</p>
                    </td>
                    <td class="p-3 align-middle border-0"><a class="reset-anchor" href="#!"><i class="fas fa-trash-alt small text-muted"></i></a></td>
                  </tr>
                </tbody>
              </table>
            </div> -->
      <!-- CART NAV-->
      <!-- <div class="bg-light px-4 py-3">
              <div class="row align-items-center text-center">
                <div class="col-md-6 mb-3 mb-md-0 text-md-start"><a class="btn btn-link p-0 text-dark btn-sm" href="shop.html"><i class="fas fa-long-arrow-alt-left me-2"> </i>Continue shopping</a></div>
                <div class="col-md-6 text-md-end"><a class="btn btn-outline-dark btn-sm" href="checkout.html">Procceed to checkout<i class="fas fa-long-arrow-alt-right ms-2"></i></a></div>
              </div>
            </div>
          </div> -->
      <!-- ORDER TOTAL-->
      <!-- <div class="col-lg-4">
            <div class="card border-0 rounded-0 p-lg-4 bg-light">
              <div class="card-body">
                <h5 class="text-uppercase mb-4">Cart total</h5>
                <ul class="list-unstyled mb-0">
                  <li class="d-flex align-items-center justify-content-between"><strong class="text-uppercase small font-weight-bold">Subtotal</strong><span class="text-muted small">$250</span></li>
                  <li class="border-bottom my-2"></li>
                  <li class="d-flex align-items-center justify-content-between mb-4"><strong class="text-uppercase small font-weight-bold">Total</strong><span>$250</span></li>
                  <li>
                    <form action="#">
                      <div class="input-group mb-0">
                        <input class="form-control" type="text" placeholder="Enter your coupon">
                        <button class="btn btn-dark btn-sm w-100" type="submit"> <i class="fas fa-gift me-2"></i>Apply coupon</button>
                      </div>
                    </form>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </section> -->

      <section class="py-5">
        <h2 class="h5 text-uppercase mb-4">Shopping cart</h2>
        <div class="row">
          <div class="col-lg-8 mb-4 mb-lg-0">
            <!-- CART TABLE-->
            <div class="table-responsive mb-4">
              <table class="table text-nowrap">
                <thead class="bg-light">
                  <tr>
                    <th class="border-0 p-3" scope="col"> <strong class="text-sm text-uppercase">Product</strong></th>
                    <th class="border-0 p-3" scope="col"> <strong class="text-sm text-uppercase">Price</strong></th>
                    <th class="border-0 p-3" scope="col"> <strong class="text-sm text-uppercase">Size</strong></th>
                    <th class="border-0 p-3" scope="col"> <strong class="text-sm text-uppercase">Quantity</strong></th>
                    <th class="border-0 p-3" scope="col"> <strong class="text-sm text-uppercase">Total</strong></th>
                    <th class="border-0 p-3" scope="col"> <strong class="text-sm text-uppercase"></strong></th>
                  </tr>
                </thead>
                <tbody class="border-0">
                  <?php foreach ($resultado as $producto) { ?>
                    <tr>
                      <th class="ps-0 py-3 border-light" scope="row">
                        <div class="d-flex align-items-center "><a class="reset-anchor d-block animsition-link" href="../../views/detalle_producto.php?id=<?php echo $producto['producto_id']; ?>"><img src="../../public/img/<?php echo $producto['imagen']; ?>" alt="..." width="70" /></a>
                          <div class="ms-3 product-name"><strong class="h6"><a class="reset-anchor animsition-link " href="../../views/detalle_producto.php?id=<?php echo $producto['producto_id']; ?>"><?php echo $producto['nombre']; ?></a></strong></div>
                        </div>
                      </th>
                      <td class="p-3 align-middle border-light">
                        <p class="mb-0 small"><?php echo $producto['precio']; ?> €</p>
                      </td>
                      <td class="p-3 align-middle border-light">
                        <p class="mb-0 small"><?php echo $producto['talla']; ?></p>
                      </td>
                      <td class="p-3 align-middle border-light">
                        <div class="border d-flex align-items-center justify-content-between px-3"><span class="small text-uppercase text-gray headings-font-family">Quantity</span>
                          <div class="quantity">
                            <button class="p-0" onclick="decrementQuantity(this)"><i class="fas fa-caret-left"></i></button>
                            <input class="form-control form-control-sm border-0 shadow-0 p-0 quantity-input" type="text" value="<?php echo $producto["cantidad"] ?>" />
                            <button class="p-0" onclick="incrementQuantity(this)"><i class="fas fa-caret-right"></i></button>
                          </div>
                        </div>
                      </td>
                      <td class="p-3 align-middle border-light">
                        <p class="mb-0 small product-subtotal"><?php
                                                                $precio_total = $producto['precio'] * $producto["cantidad"];
                                                                $precio_total_formatted = number_format($precio_total, 2);
                                                                echo $precio_total_formatted . " €";
                                                                ?></p>
                      </td>
                      <td class="p-3 align-middle border-light"><a class="reset-anchor"><i class="fas fa-trash-alt small text-muted" onClick="delete_cart(<?php echo $producto['id']; ?>)"></i></a></td>

                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
            <!-- CART NAV-->
            <div class="bg-light px-4 py-3">
              <div class="row align-items-center text-center">
                <div class="col-md-6 mb-3 mb-md-0 text-md-start"><a class="btn btn-link p-0 text-dark btn-sm" href="../../views/shop.php?pagina=1"><i class="fas fa-long-arrow-alt-left me-2"> </i>Continue shopping</a></div>
                <div class="col-md-6 text-md-end"><a class="btn btn-outline-dark btn-sm" href="../../views/Checkout/">Procceed to checkout<i class="fas fa-long-arrow-alt-right ms-2"></i></a></div>
              </div>
            </div>
          </div>
          <!-- ORDER TOTAL-->
          <div class="col-lg-4">
            <div class="card border-0 rounded-0 p-lg-4 bg-light">
              <div class="card-body">
                <h5 class="text-uppercase mb-4">Cart total</h5>
                <ul class="list-unstyled mb-0">
                  <!-- <li class="d-flex align-items-center justify-content-between"><strong class="text-uppercase small font-weight-bold">Subtotal</strong><span class="text-muted small">$250</span></li> -->
                  <li class="border-bottom my-2"></li>
                  <li class="d-flex align-items-center justify-content-between mb-4"><strong class="text-uppercase small font-weight-bold">Total</strong>
                    <span class="cart-total"><?php echo $precio ?> €</span>
                  </li>
                  <li>
                    <form action="#">
                      <div class="mb-0">
                        <input class="form-control mb-1" type="text" placeholder="Enter your coupon">
                        <button class="btn btn-dark btn-sm w-100" type="submit"> <i class="fas fa-gift me-2"></i>Apply coupon</button>
                      </div>
                    </form>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </section>

    </div>
    <footer class="bg-dark text-white">
      <?php include '../../config/MainFooter.php'; ?>
    </footer>
    <!-- JS -->
    <?php include '../../config/MainJs.php'; ?>

    <!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  </div>
</body>

<script src="./Cart/cart.js"></script>

</html>