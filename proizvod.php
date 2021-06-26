<?php require_once 'inc/header.php'; ?>

<?php require_once 'inc/nav.inc.php'; ?>
<?php if(isset($_GET['id'])) {
    $proizvod = $product->show($_GET['id']);
    $products = $product->related($_GET['id']);
}
?>
        <div class="breadcumb-wrapper breadcumb-layout1 bg-fluid pt-200 pb-200" data-bg-src="assets/img/breadcumb/breadcumb-img-1.jpg">
            <div class="container">
                <div class="breadcumb-content text-center">
                    <h1 class="breadcumb-title">Proizvod</h1>
                    <ul class="breadcumb-menu-style1 mx-auto">
                        <li><a href="index.php">Početna</a></li>
                        <li class="active"><?php echo $proizvod->name; ?></li>
                    </ul>
                </div>
            </div>
        </div>
        <section class="vs-shop-wrapper shop-details space-top space-md-bottom">
            <div class="container">
                <div class="row mb-5">
                    <div class="col-md-6 col-xl-5 mb-30 mb-md-0">
                    <div id="carouselExampleControls" class="carousel carousel-dark slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="<?php echo $proizvod->image1; ?>" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="<?php echo $proizvod->image2; ?>" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="<?php echo $proizvod->image3; ?>" class="d-block w-100" alt="...">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="product-content">
                        <form action="cart.php" method="POST">
                            <h3 class="product-title mb-1"><?php echo $proizvod->name; ?></h3>
                            <span class="price font-theme"><strong><?php echo $proizvod->price; ?> RSD</strong></span>
                            <p class="fs-xs my-4"><?php echo $proizvod->details; ?></p>
                            <div class="mt-2 link-inherit fs-xs">
                                <p>
                                    <strong class="text-title me-3 font-theme">Dostupnost :</strong><a href="#"><i class="far fa-check-square me-2"></i><?php echo $proizvod->status; ?></a>
                                </p>
                            </div>
                            <div class="actions mb-4 pb-2">
                                <div class="quantity style2 me-4">
                                    <input type="number" class="qty-input" value="1" min="1" max="99" name="quantity" /> <button class="quantity-minus qut-btn"><i class="far fa-chevron-down"></i></button>
                                    <button class="quantity-plus qut-btn"><i class="far fa-chevron-up"></i></button>
                                </div>
                                <input type="hidden" name="name" value="<?php echo $proizvod->name; ?>">
                                <input type="hidden" name="price" value="<?php echo $proizvod->price; ?>">
                                <input type="hidden" name="image" value="<?php echo $proizvod->image1; ?>">
                                <input type="hidden" name="sku" value="<?php echo $proizvod->sku; ?>">
                                <input type="hidden" name="id" value="<?php echo $proizvod->id; ?>">
                                <input type="submit" name="addToCartBtn" class="vs-btn shadow-none" value="Dodaj na karticu"></input>
                            </div>
                            <div class="product_meta">
                                <span class="sku_wrapper">SKU: <span class="sku"><?php echo $proizvod->sku; ?></span></span>
                            </div>
                            <br>
                            <p><strong>Troškovi dostave: </strong> po cenovniku <a href="http://www.postexpress.rs/struktura/lat/cenovnik/cenovnik-unutrasnji-saobracaj.asp">kurirske službe</a></p>
                        </form>
                        </div>
                    </div>
                    <div class="col-xl-3 d-none d-xl-block">
                        <div class="widget">
                            <h3 class="widget_title">Ostali proizvodi</h3>
                            <div class="vs-widget-recent-post">
                            <?php foreach($products as $single) : ?>
                                <div class="recent-post d-flex align-items-center">
                                    <div class="media-img"><img src="<?php echo $single->image1; ?>" width="100" height="73" alt="<?php echo $single->name; ?>" /></div>
                                    <div class="media-body pl-30">
                                        <h4 class="recent-post-title h5 mb-0"><a href="proizvod.php?id=<?php echo $single->id; ?>"><?php echo $single->name; ?></a></h4>
                                        <a href="proizvod.php?id=<?php echo $single->id; ?>" class="text-theme fs-12"><?php echo $single->price; ?> RSD</a>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<?php require_once 'inc/bottom.php'; ?>