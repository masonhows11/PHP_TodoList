<?php


include  "bootstrap/init.php";

if(isset($_GET['logout'])){
    logOut();
}

if(!isLoggedIn()){

    header("Location:" . site_uri('login.php'));
}

if(isset($_GET['delete_folder']) && is_numeric($_GET['delete_folder'])){
  $deletedCount =  deleteFolder($_GET['delete_folder']);
 // echo "$deletedCount folders successfully deleted!";
}

if(isset($_GET['delete_task']) && is_numeric($_GET['delete_task'])){
    $deletedCount =  deleteTask($_GET['delete_task']);
    // echo "$deletedCount folders successfully deleted!";
}

$folders = getFolders();

$tasks = getTasks();

include  "views/index.view.php";