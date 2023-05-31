<?php

include "bootstrap/init.php";


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_GET['action'];
    $params = $_POST;
    if ($action = 'register') {
        $result = register($params);
        if (!$result) {
            message('register failed : error in registration !');
        }else{
            message('register successfully');
        }
    }
}

include "views/register.view.php";