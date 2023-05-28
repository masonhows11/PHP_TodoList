<?php

function getTasks(){

}

function getFolders()
{
    global $pdo;

    $sql = "select * from folders";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    // get all folder records as object type
    $records = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $records;
}