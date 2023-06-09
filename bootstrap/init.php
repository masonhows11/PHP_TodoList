<?php
session_start();

include "constants.php";
include BASE_PATH . "/bootstrap/config.php";
// for use all packages in vendor composer system we should include
// autoload.php file in init.php file
include BASE_PATH . "/vendor/autoload.php";
include BASE_PATH . "/libraries/helpers.php";
// mysql pdo connection
try {
    $pdo = new PDO("mysql:dbname=$database_config->db;host={$database_config->host}", $database_config->user, $database_config->pass);
    // set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    diePage("Connection failed: " . $e->getMessage());
}


include BASE_PATH . "/libraries/lib-auth.php";
include BASE_PATH . "/libraries/lib-tasks.php";

