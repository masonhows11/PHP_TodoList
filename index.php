<?php

include "bootstrap/init.php";


if(isset($_GET['delete_folder']) && is_numeric($_GET['delete_folder'])){
    deleteFolder($_GET['delete_folder']);
}

$folders = getFolders();

$tasks = getTasks();

include  "views/index.view.php";