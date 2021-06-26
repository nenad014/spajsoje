<?php

require_once 'bootstrap.php';

if(isset($_POST['logBtn'])) {
    $user->loginToProceed();
}