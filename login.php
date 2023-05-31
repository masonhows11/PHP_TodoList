<?php

include "bootstrap/init.php";


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_GET['action'];
    $params = $_POST;
    if ($action = 'login') {
        $result = login($params['email'], $params['password']);
        if (!$result) {
            message('login failed : email or password is incorrect');
        }
    }
}

include "views/login.view.php";