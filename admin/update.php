<?php

require_once '../bootstrap.php';

if(isset($_POST['updateProductBtn'])) {
    $product->update();
}

if(isset($_POST['updatePostBtn'])) {
    $blog->update();
}

if(isset($_POST['updateRecipeBtn'])) {
    $recipe->update();
}

if(isset($_POST['updateOrderBtn'])) {
    $order->update();
}