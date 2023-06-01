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
    $sql = "SELECT * FROM users WHERE email= :email";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':email' => $email]);
    // get array of object from result of query
    $records = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $records[0] ?? null;
}


function login($email)
{
    $user = getUserByEmail($email);
    if (is_null($user)) {
        return false;
    }
    

    return true;

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