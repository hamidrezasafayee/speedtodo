<?php
function diePage(string $msg)
{
    echo "<div style='padding: 30px;width: 80%;margin: 50px auto;background: #f9dede;color: #521717;border-radius: 10px;font-family: sans-serif;'>$msg</div>";
    die();
}

function dd($var)
{
    echo "<pre style='background: #fff; padding: 10px; border-left:4px solid red;'>";
    var_dump($var);
    echo "</pre>";
}

function isAjaxRequest()
{
    if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
        return true;
    }
    return false;
}

function siteUrl($uri = null)
{
    return BASE_URL . $uri;
}