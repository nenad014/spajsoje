<?php require_once 'inc/header.php'; ?>
<?php require_once 'inc/nav.inc.php'; ?>
        <div class="breadcumb-wrapper breadcumb-layout1 bg-fluid pt-200 pb-200" data-bg-src="assets/img/breadcumb/breadcumb-img-1.jpg">
            <div class="container">
                <div class="breadcumb-content text-center">
                    <h1 class="breadcumb-title">Moja korpa</h1>
                    <ul class="breadcumb-menu-style1 mx-auto">
                        <li><a href="index.php">početna</a></li>
                        <li class="active">Moja korpa</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="vs-cart-wrapper space-top space-md-bottom">
            <div class="container">
                <form action="#" class="woocommerce-cart-form">
                    <table class="cart_table">
                        <thead>
                            <tr>
                                <th class="cart-col-image">Slika</th>
                                <th class="cart-col-productname">Proizvod</th>
                                <th class="cart-col-price">Cena</th>
                                <th class="cart-col-quantity">Količina</th>
                                <th class="cart-col-total">Ukupno</th>
                                <th class="cart-col-remove">Ukloni</th>
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
                                <td data-title="Slika">
                                    <a class="cart-productimage" href="#"><img width="91" height="91" src="<?php echo $values['item_img']; ?>" alt="Image" /></a>
                                </td>
                                <td data-title="Proizvod"><a class="cart-productname" href="#"><?php echo $values['item_name']; ?></a></td>
                                <td data-title="Cena">
                                    <span class="amount">
                                        <bdi><?php echo number_format($values['item_price'], 2); ?><span> RSD</span></bdi>
                                    </span>
                                </td>
                                <td data-title="Količina">
                                    <?php echo $values['item_quantity']; ?>
                                </td>
                                <td data-title="Ukupno">
                                    <span class="amount">
                                        <bdi><?php echo number_format($values['item_quantity'] * $values['item_price']); ?><span> RSD</span></bdi>
                                    </span>
                                </td>
                                <td data-title="Ukloni">
                                    <a href="cart.php?action=delete&id=<?php echo $values["item_id"]; ?>" class="remove"><i class="fal fa-trash-alt"></i></a>
                                </td>
                            </tr>
                            <?php
                            $total = $total + ($values['item_quantity'] * $values['item_price']);
                            } ?>
                            <tr>
                                <td colspan="6" class="actions">
                                    <p><strong>UKUPNO: </strong> <?php echo number_format($total, 2); ?> RSD</p>
                                    <a href="porudzbina.php" class="vs-btn rounded-1 shadow-none">Poruči</a>
                                </td>
                            </tr>
                            <?php
                    }  ?>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>

<?php require_once 'inc/bottom.php'; ?>