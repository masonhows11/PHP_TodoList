<?php

include "bootstrap/init.php";


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $action = $_GET['action'];
    if($action = 'login'){
       // login();
    }
}

include "views/login.view.php";