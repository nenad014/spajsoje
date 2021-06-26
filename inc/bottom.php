        <div class="bg2" data-bg-src="assets/img/footer/footer-bg-1.jpg">
            <footer class="footer-wrapper footer-layout1 px-70 py-70">
                <div class="container">
                    <div class="widget-area pt-100">
                        <div class="row align-items-start justify-content-between">
                            <div class="col-sm-6 col-lg-4 col-xl-3">
                                <div class="widget footer-widget">
                                    <h3 class="widget_title">Kontaktirajte nas</h3>
                                    <div class="vs-widget-about">
                                        <p class="fs-md">
                                            Gandijeva 130b<br />
                                            11070 Novi Beograd
                                        </p>
                                        <p class="mb-1 link-inherit"><i class="fas fa-paper-plane me-3"></i><a href="mailto:info@spajsoje.com@email.com">info@spajsoje.com</a></p>
                                        <p class="mb-0 link-inherit"><i class="fal fa-fax me-3"></i><a href="tel:+381641984447">+381 64 198 44 47</a></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-2 col-xl-2">
                                <div class="widget widget_nav_menu footer-widget">
                                    <h3 class="widget_title">Korisni linkovi</h3>
                                    <div class="menu-all-pages-container">
                                        <ul class="menu">
                                            <li><a href="index.php">Home</a></li>
                                            <li><a href="o-nama.php">O nama</a></li>
                                            <li><a href="blog.php">Blog</a></li>
                                            <li><a href="error.html">Terms Of Service</a></li>
                                            <li><a href="error.html">Privacy Policy</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-2 col-xl-2">
                                <div class="widget footer-widget">
                                    <h3 class="widget_title">Pratite nas</h3>
                                    <div class="footer-social-links">
                                        <ul>
                                            <li>
                                                <a href="https://www.facebook.com/spajsoje/"><i class="fab fa-facebook-f"></i>facebook</a>
                                            </li>
                                            <li>
                                                <a href="https://www.instagram.com/spajsoje/"><i class="fab fa-instagram"></i>instagram</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div> 
                            <div class="col-sm-6 col-lg-4 col-xl-4">
                                <div class="widget footer-widget">
                                    <h3 class="widget_title">Pronađite nas</h3>
                                    <div class="footer-map pt-1">
                                        <iframe
                                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2830.8607036672897!2d20.38278801540672!3d44.80402737909875!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x475a6f7426d2b953%3A0x6ba2c683ee697edd!2sGandijeva%20130b%2C%20Beograd%20192683!5e0!3m2!1sen!2srs!4v1620929198503!5m2!1sen!2srs"
                                            style="border: 0;"
                                            allowfullscreen=""
                                            aria-hidden="false"
                                            tabindex="0"
                                        ></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="copyright text-center pb-35">
                        <p class="mb-0 link-inherit font-theme">&copy; 2021 <a href="index.php">Spajsoje</a> By <a href="http://newage.rs/">New Age Digital studio</a> . All Rights Reserved.</p>
                    </div>
                </div>
            </footer>
        </div>
        <div class="sidemenu-wrapper d-none d-lg-block">
            <div class="sidemenu-content">
                <button class="closeButton border-theme text-theme bg-theme-hover sideMenuCls"><i class="far fa-times"></i></button>
                <div class="widget widget_shopping_cart">
                    <h3 class="widget_title">Moja korpa</h3>
                    <div class="widget_shopping_cart_content">
                        <ul class="cart_list">
                        <?php if(isset($_COOKIE['shopping_cart'])) {
                                $total = 0;
                                $cookie_data = stripslashes($_COOKIE['shopping_cart']);
                                $cart_data = json_decode($cookie_data, true);
                                foreach($cart_data as $keys => $values) { ?>
                            <li class="mini_cart_item">
                                <a href="cart.php?action=delete&id=<?php echo $values["item_id"]; ?>" class="remove"><i class="fal fa-trash-alt"></i></a> <a href="#"><img src="<?php echo $values['item_img']; ?>" alt="Cart Image" /><?php echo $values['item_name']; ?></a>
                                <span class="quantity">
                                <?php echo $values['item_quantity']; ?> * <span class="amount"><span><?php echo number_format($values['item_price'], 2); ?></span> RSD</span>
                                </span>
                            </li>
                            <?php
                            $total = $total + ($values['item_quantity'] * $values['item_price']);
                            } ?>
                        </ul>
                        <p class="total">
                            <strong>Ukupno:</strong> <span class="amount"><span><?php echo number_format($total, 2); ?></span> RSD</span>
                        </p>
                        <?php
                    }  ?>
                        <p class="buttons"><a href="moja_korpa.php" class="vs-btn">Vidi korpu</a> <a href="porudzbina.php" class="vs-btn">Porudžbina</a></p>
                    </div>
                </div>
            </div>
        </div>
        <a href="#" class="scrollToTop"><i class="far fa-angle-up"></i></a>
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
        <script src="assets/js/vendor/jquery-1.12.4.min.js"></script>
        <script src="assets/js/app.min.js"></script>
        <script src="assets/js/vscustom-carousel.min.js"></script>
        <script src="assets/js/vsmenu.min.js"></script>
        <script src="assets/js/ajax-mail.js"></script>
        <script src="assets/js/vs-colorplate.min.js"></script>
        <script src="assets/js/main.js"></script>
    </body>
</html>