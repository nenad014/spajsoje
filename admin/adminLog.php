<?php

require_once '../bootstrap.php';

if(isset($_POST['adminLogBtn'])) {
    $admin->logAdmin();
}