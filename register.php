<?php

include "bootstrap/init.php";


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_GET['action'];
    if ($action = 'register') {
        register($_POST);
    }
}

include "views/register.view.php";