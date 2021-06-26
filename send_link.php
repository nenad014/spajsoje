<?php

require_once 'bootstrap.php';

if(isset($_POST['submit_email'])) {
    $user->resetPwd();
}