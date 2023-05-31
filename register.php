<?php

include "bootstrap/init.php";


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_GET['action'];
    $params = $_POST;
    if ($action = 'register') {
       $result = register($params);
       dd($result);
    }
}

include "views/register.view.php";