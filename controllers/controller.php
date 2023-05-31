<?php

include_once "../bootstrap/init.php";

if (!isAjaxRequest()) {
    diePage("Invalid Request !");
}

if (!isset($_POST['action']) || empty($_POST['action'])) {
    diePage("Invalid Action !");
}

switch ($_POST['action']) {

    case "doneStatus":
        $taskId = $_POST['taskId'];
        if (!isset($taskId)  || !is_numeric($taskId)) {
            echo "The task id not valid";
            die();
        }
        changeTaskStatus($taskId);
        break;
    case "addFolder":
        if (!isset($_POST['folderName']) || strlen($_POST['folderName']) < 3) {
            echo "Folder name must be greater than 2 chars.";
            die();
        }
        echo addFolder($_POST['folderName']);
        break;
    case "addTask":
        $taskName = $_POST['taskName'];
        $folderId = $_POST['folderId'];
        if (!isset($folderId) || empty($folderId) || !is_numeric($folderId)) {
            echo "please select folder !";
            die();
        }
        if (!isset($taskName) || strlen($taskName) < 10) {
            echo "Task name must be greater than 2 chars.";
            die();
        }
        echo addTask($taskName, $folderId);
        break;
    default:
        diePage("Invalid Action !");
}

