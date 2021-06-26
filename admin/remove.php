<?php

require_once '../bootstrap.php';

if(isset($_GET['id'])) {
    $product->delete($_GET['id']);
}
if(isset($_GET['r_id'])) {
    $recipe->delete($_GET['r_id']);
}
if(isset($_GET['blog_id'])) {
    $blog->delete($_GET['blog_id']);
}
if(isset($_GET['u_id'])) {
    $user->delete($_GET['u_id']);
}