<?php
include "bootstrap/init.php";

$homeUrl = siteUrl();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_GET['action'];
    $params = $_POST;
    if ($action == 'register') {
        $result = register($params);
        if (!$result) {
            messageError("Error in register. please try again later");
        } else {
            message("Registeration is successfully. <a href='auth.php'>Back and login to site</a>");
        }
    }elseif($action == 'login'){
        $result = login($params['email'],$params['password']);
        if (!$result) {
            messageError("email or password inconrrect");
        } else {
            header("location:".$homeUrl);
            die();
        }
    }
}


# include view 
include "tpl/tpl-auth.php";
