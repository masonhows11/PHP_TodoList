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
        if (!isset($_POST['folderName']) || strlen($_POST['folderName']) < 3) {
            echo "Folder name must be greater than 2 chars.";
            die();
        }
        echo addFolder($_POST['folderName']);
        break;
    case "addTask":
        if (!isset($_POST['taskName']) || strlen($_POST['taskName']) < 10) {
            echo "Task name must be greater than 10 chars.";
            die();
        }
        echo addTask($_POST['taskName']);
        break;
    default:
        diePage("Invalid Action !");
}

