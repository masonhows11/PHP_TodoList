<?php

include "bootstrap/init.php";

$home_url = site_uri();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_GET['action'];
    $params = $_POST;
    if ($action = 'register') {
        $result = register($params);
        if (!$result) {
            message('register failed : error in registration !','warning');
        }else{
            message("register successfully .<br/>
                    <a href='{$home_url}login.php'>Please login</a>",'success');
        }
    }
}

include "views/register.view.php";