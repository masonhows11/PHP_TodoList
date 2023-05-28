<?php

include "bootstrap/init.php";

$folders = getFolders();

$tasks = getTasks();

include  "views/index.view.php";