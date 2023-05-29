<?php
defined('BASE_PATH') OR die("Permission Denied!");

// folder functions
function addFolder($folder)
{
    global $pdo;
    $current_user_id = getCurrentUserId();
    $sql = "insert into folders (name,user_id) VALUES (:folder_name,:user_id);";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':folder_name' => $folder, ':user_id' => $current_user_id]);
    return $stmt->rowCount();
}

function deleteFolder($folder_id)
{
    global $pdo;
    $sql = "delete  from folders where id = $folder_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->rowCount();
}

function getFolders()
{
    global $pdo;
    $current_user_id = getCurrentUserId();
    $sql = "select * from folders where user_id = $current_user_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    // get all folder records as object type
    $records = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $records;
}

// task functions

function deleteTask($task_id)
{

}

function addTask($task)
{

}

function getTasks()
{

}