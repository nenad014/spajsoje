        <div class="sticky-header-wrap sticky-header py-2 py-lg-1">
            <div class="container position-relative">
                <div class="row align-items-center">
                    <div class="col-5 col-md-3">
                        <div class="logo">
                            <a href="index.php"><img src="assets/img/logo.png" alt="Spajsoje" /></a>
                        </div>
                    </div>
                    <div class="col-7 col-md-9 text-end position-static">
                        <nav class="main-menu menu-sticky1 d-none d-lg-block link-inherit">
                            <ul>
                                <li><a href="index.php">Početna</a></li>
                                <li><a href="recepti.php">Recepti</a></li>
                                <li><a href="blog.php">Blog</a></li>
                                <li><a href="o-nama.php">O nama</a></li>
                                <li><a href="prodavnice-i-restorani.php">Prodavnice i restorani</a></li>
                                <li><a href="kontakt.php">Kontakt</a></li>
                            </ul>
                        </nav>
                        <button class="vs-menu-toggle d-inline-block d-lg-none"><i class="far fa-bars"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="vs-menu-wrapper">
            <div class="vs-menu-area">
                <button class="vs-menu-toggle"><i class="fal fa-times"></i></button>
                <div class="mobile-logo">
                    <a href="index.php"><img src="assets/img/logo.png" alt="Spajsoje" /></a>
                </div>
                <div class="vs-mobile-menu link-inherit"></div>
            </div>
        </div>
        <header class="header-wrapper header-layout3 header3-margin">
            <div class="container py-30">
                <div class="row align-items-center">
                    <div class="col-6">
                        <div class="header-logo">
                            <a href="index.php"><img src="assets/img/logo.png" alt="Spajsoje" /></a>
                        </div>
                    </div>
                    <div class="col-6 text-end">
                        <button type="button" class="vs-menu-toggle d-inline-block d-lg-none"><i class="far fa-bars"></i></button>
                        <div class="head-top-links text-body2 d-none d-lg-block">
                            <a href="#" class="icon-btn has-badge bg2 me-4 sideMenuToggler"><i class="fal fa-shopping-cart"></i><span class="badge"><?php if(isset($_COOKIE['shopping_cart'])) {
                        $no_of_item = 0;
                        $cookie_data = stripslashes($_COOKIE['shopping_cart']);
                        $cart_data = json_decode($cookie_data, true);

                        echo count($cart_data);
                    } ?></span></a> <a href="korisnik.php"><span class="icon-btn bg4"><i class="fal fa-user"></i></span></a>
                            <ul>
							<?php if(!isset($_SESSION['loggedUser'])) : ?>
								<li><a href="prijava.php">Prijava</a></li>
                                <li><a href="registracija.php">Registracija</a></li>
							<?php else : ?>
								<li><a href="logout.php">Odjava</a></li>
							<?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container d-none d-lg-block">
                <div class="header3-inner position-relative">
                    <div class="row align-items-center">
                        <div class="col-lg-8 offset-lg-2">
                            <nav class="main-menu menu-style1 mobile-menu-active menu-style2">
                                <ul>
                                    <li><a href="index.php">Početna</a></li>
                                    <li><a href="recepti.php">Recepti</a></li>
                                    <li><a href="blog.php">Blog</a></li>
                                    <li><a href="o-nama.php">O nama</a></li>
                                    <li><a href="prodavnice-i-restorani.php">Prodavnice i restorani</a></li>
                                    <li><a href="kontakt.php">Kontakt</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </header>