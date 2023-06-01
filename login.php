<?php

include "bootstrap/init.php";

$home_url = site_uri();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_GET['action'];
    $params = $_POST;
    if ($action = 'login') {
        $result = login($params['email'], $params['password']);
        if (!$result) {
            message('Login Failed : Email or password is incorrect','warning');
        } else {
            message("login successfully .<br/>
                    <a href={'$home_url}'>Manage Your Tasks</a>",'success');

        }
    }
}

include "views/login.view.php";