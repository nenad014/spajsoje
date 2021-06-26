<?php

require_once 'bootstrap.php';

if(isset($_POST['regBtn'])) {
    $user->register();
}

if(isset($_POST['logBtn'])) {
    $user->login();
}