<?php

include_once "../bootstrap/init.php";

if (!isAjaxRequest()) {
    diePage("Invalid Request !");
}

if (!isset($_POST['action']) || empty($_POST['action'])) {
    diePage("Invalid Action !");
}

switch ($_POST['action']) {

    case "addFolder":
       echo addFolder($_POST['folderName']);
        break;
    case "addTask":

        break;
    default:
        diePage("Invalid Action !");
}

