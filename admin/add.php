<?php

require_once '../bootstrap.php';

if(isset($_POST['addProductBtn'])) {
    $product->create();
}
if(isset($_POST['addPostBtn'])) {
    $blog->create();
}
if(isset($_POST['addRecipeBtn'])) {
    $recipe->create();
}