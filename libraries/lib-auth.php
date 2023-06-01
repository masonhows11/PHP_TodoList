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

function getUserByEmail($email)
{

    global $pdo;
    $sql = "select * from users where email=':email'";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':email' => $email]);
    return $stmt->rowCount() ? true : false;
}


function login($email)
{

    $user = getUserByEmail($email);
    return 1;

}

function register($params)
{
    global $pdo;
    $pass = password_hash($params['password'], PASSWORD_BCRYPT);
    $sql = "insert into users (name,email,password) VALUES (:name,:email,:password);";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':name' => $params['name'], ':email' => $params['email'], ':password' => $pass]);
    return $stmt->rowCount() ? true : false;
}