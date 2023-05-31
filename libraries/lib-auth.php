<?php
defined('BASE_PATH') or die("Permission Denied!");

function getCurrentUserId()
{
    return 1;
}

function isLoggedIn()
{
    return false;

}


function login($email, $password)
{
    global $pdo;

    $sql = "select * from users where email=':email' and password=':password' ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':email' => $email, ':password' => $password]);
    return $stmt->rowCount() ? true : false;
}

function register($params)
{
    global $pdo;

    $sql = "insert into users (name,email,password) VALUES (:name,:email,:password);";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':name' => $params['name'], ':email' => $params['email'], ':password' => $params['password']]);
    return $stmt->rowCount() ? true : false;
}