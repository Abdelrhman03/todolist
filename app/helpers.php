<?php

use App\App;

function home()
{
    return trim(App::get("config")['app']["home_url"],'/'); // will retrun http://localhost/phptutorialPartTwo
}

function redirect($to)
{
    header("Location: {$to}");   // will take u to $location 
}

function redirect_home()
{
    redirect(home());
}

function back()
{
    redirect($_SERVER["HTTP_REFERER"]?? home());
}

function view ($name, $data = [])
{
    if ($data != NULL)
    {
        extract($data);
    }
    require "resources/{$name}.view.php";
}