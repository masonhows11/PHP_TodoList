<?php

function diePage($msg)
{
    echo "<div style='padding: 50px;margin: 0 auto;background: deepskyblue;width: 80%;border: 1px solid dodgerblue;border-radius:10px;font-family:sans-serif'>
    <p style='text-align: center'>$msg</p>
    </div>";
    die();
}