<?php
defined('BASE_PATH') OR die("Permission Denied!");


function getCurrentUrl(){
    return 1;
}

function diePage($msg)
{
    echo "<div style='padding: 50px;margin: 0 auto;background: deepskyblue;width: 80%;border: 1px solid dodgerblue;border-radius:10px;font-family:sans-serif'>
    <p style='text-align: center'>$msg</p>
    </div>";
    die();
}

function isAjaxRequest()
{
    if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
        return true;
    }
    return false;
}