<?php

require_once 'bootstrap.php';

if(isset($_POST['orderBtn'])) {
    $order->create();
    setcookie("shopping_cart", "", time() - 3600);
}