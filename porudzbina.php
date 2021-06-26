<?php require_once 'inc/header.php'; ?>
<?php
    if(!isset($_SESSION['loggedUser'])) {
        header('Location: login.view.php');
    }
    $single = $user->show($_SESSION['loggedUser']->u_id);
?>
<?php require_once 'inc/nav.inc.php'; ?>

        <div class="breadcumb-wrapper breadcumb-layout1 bg-fluid pt-200 pb-200" data-bg-src="assets/img/breadcumb/breadcumb-img-1.jpg">
            <div class="container">
                <div class="breadcumb-content text-center">
                    <h1 class="breadcumb-title">Porudžbina</h1>
                    <ul class="breadcumb-menu-style1 mx-auto">
                        <li><a href="index.php">početna</a></li>
                        <li class="active">porudžbina</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="vs-checkout-wrapper space-top space-md-bottom">
            <div class="container">
                <form action="order.php" class="woocommerce-checkout mt-40" method="POST">
                    <div class="row">
                        <div class="col-lg-8 offset-lg-2">
                            <h2 class="h4">Detalji porudžbine</h2>
                            <div class="row gx-2">
                                <div class="col-md-6 form-group"><label>Ime *</label> <input type="text" name="fname" class="form-control" placeholder="Ime" /></div>
                                <div class="col-md-6 form-group"><label>Prezime *</label> <input type="text" name="lname" class="form-control" placeholder="Prezime" /></div>
                                <div class="col-12 form-group">
                                    <label>Adresa *</label> <input type="text" name="address" class="form-control" placeholder="Unesite Vašu adresu" />
                                </div>
                                <div class="col-12 form-group">
                                    <label>Adresa isporuke *</label> <input type="text" name="delivery_address" class="form-control" placeholder="Unesite adresu isporuke" />
                                </div>
                                <div class="col-12 form-group"><label>Kontakt informacije *</label> <input type="email" name="email" class="form-control" value="<?php echo $single->email; ?>" placeholder="Email adresa" /> <input type="tel" name="phone" class="form-control" placeholder="Broj telefona" /></div>
                            </div>
                        </div>
                    </div>
                <h4 class="mt-4 pt-lg-2">Vaša porudžbina</h4>
                <div class="woocommerce-cart-form">
                    <table class="cart_table mb-20">
                        <thead>
                            <tr>
                                <th class="cart-col-image">Slika</th>
                                <th class="cart-col-productname">Naziv proizvoda</th>
                                <th class="cart-col-price">Cena</th>
                                <th class="cart-col-quantity">Količina</th>
                                <th class="cart-col-total">Ukupno</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if(isset($_COOKIE['shopping_cart'])) {
                                $total = 0;
                                $cookie_data = stripslashes($_COOKIE['shopping_cart']);
                                $cart_data = json_decode($cookie_data, true);
                                foreach($cart_data as $keys => $values) { ?>
                            <tr class="cart_item">
                                <td data-title="Product">
                                    <a class="cart-productimage" href="#"><img width="91" height="91" src="<?php echo $values['item_img']; ?>" alt="Image" /></a>
                                </td>
                                <td data-title="Name"><a class="cart-productname" href="#"><?php echo $values['item_name']; ?></a></td>
                                <td data-title="Price">
                                    <span class="amount">
                                        <bdi><?php echo number_format($values['item_price'], 2); ?><span> RSD</span></bdi>
                                    </span>
                                </td>
                                <td data-title="Quantity"><strong class="product-quantity"><?php echo $values['item_quantity']; ?></strong></td>
                                <td data-title="Total">
                                    <span class="amount">
                                        <bdi><?php echo number_format($values['item_quantity'] * $values['item_price']); ?><span> RSD</span></bdi>
                                    </span>
                                </td>
                            </tr>
                        </tbody>
                        <?php
                            $total = $total + ($values['item_quantity'] * $values['item_price']);
                            } ?>
                    </table>
                        </div>
                <div class="border ps-2 py-2 border-light">
                    <div class="row justify-content-lg-end">
                        <div class="col-md-8 col-lg-6 col-xl-4">
                            <table class="checkout-ordertable mb-0">
                                <tbody>
                                    <tr class="order-total">
                                        <th>Ukupno</th>
                                        <td>
                                            <strong>
                                                <span class="amount">
                                                    <bdi><?php echo number_format($total, 2); ?> RSD</bdi>
                                                </span>
                                            </strong>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
                <div class="pt-10 pt-lg-5 mb-30">
                    <div class="woocommerce-checkout-payment">
                        <ul class="wc_payment_methods payment_methods methods">
                            <li class="wc_payment_method payment_method_bacs">
                                <input id="payment_method_bacs" type="radio" class="input-radio" name="payment_method" value="bacs" checked="checked" /> <label for="payment_method_bacs">Direct bank transfer</label>
                                <div class="payment_box payment_method_bacs">
                                    <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order will not be shipped until the funds have cleared in our account.</p>
                                </div>
                            </li>
                        </ul>
                <input type="hidden" name="products" value="<?php foreach($cart_data as $k=>$v) {
                        echo $v['item_name'] . ','; } ?>">
                <input type="hidden" name="products_sku" value="<?php foreach($cart_data as $k=>$v) {
                        echo $v['item_sku'] . ',';  } ?>">
                <input type="hidden" name="quantity" value="<?php foreach($cart_data as $k=>$v) {
                        echo $v['item_quantity'] . ','; } ?>"> 
                <input type="hidden" name="grand_total" value="<?php echo number_format($total, 2); ?>">
                <input type="hidden" name="user_id" value="<?php echo $_SESSION['loggedUser']->u_id; ?>">
                        <div class="form-row place-order"><button type="submit" class="vs-btn" name="orderBtn">Naruči</button></div>
                    </div>
                </div>
                <?php
                } ?>
            </div>
            </form>
        </div>

<?php require_once 'inc/bottom.php'; ?>