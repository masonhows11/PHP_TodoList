<?php
defined('BASE_PATH') or die("Permission Denied!");


function getCurrentUrl()
{
    return 1;
}

function diePage($msg)
{
    echo "<div style='padding: 50px;margin: 0 auto;background: deepskyblue;width: 80%;border: 1px solid dodgerblue;border-radius:10px;font-family:sans-serif'>
    <p style='text-align: center'>$msg</p>
    </div>";
    die();
}

function message($msg, $status)
{
    echo "<div class='alert alert-$status' style='z-index:3' role='alert'>";
    echo "<p class='text-center'>$msg</p>";
    echo "</div>";
}

function dd($msg)
{

    echo "<pre style='color:#9c4100;background: #ffffff;z-index: 999;position:relative;padding: 10px;margin: 10px;border-radius: 5px'>";
    var_dump($msg);
    echo "</pre>";
}

function isAjaxRequest()
{
    if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
        return true;
    }
    return false;
}

function site_uri($uri = '')
{
    return BASE_URL . $uri;
}

function redirect($url)
{
    header("Location: $url");
    die();
}