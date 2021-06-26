<?php

require_once 'bootstrap.php';

if(isset($_POST['updateUserBtn'])) {
    $user->update();
}

if(isset($_POST['resetPasswordBtn'])) {
    $user->resetPassword();
}