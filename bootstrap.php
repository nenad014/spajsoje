<?php
ini_set('session.save_path',realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/session'));
session_start();

require_once 'class/Connection.php';
require_once 'class/Admin.php';
require_once 'class/Product.php';
require_once 'class/Blog.php';
require_once 'class/Recipe.php';
require_once 'class/User.php';
require_once 'class/Order.php';


$db = new Connection();
$conn = $db->getConnection();

$admin = new Admin($conn);
$product = new Product($conn);
$blog = new Blog($conn);
$recipe = new Recipe($conn);
$user = new User($conn);
$order = new Order($conn);