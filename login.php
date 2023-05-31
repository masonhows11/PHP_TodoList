<?php

include "bootstrap/init.php";


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_GET['action'];
    $params = $_POST;
    if ($action = 'login') {
        $result = login($params['email'], $params['password']);
        dd($result);
    }
}

include "views/login.view.php";