<?php
include_once "../bootstrap/init.php";

if (!isAjaxRequest()) {
    diePage("Invalid Request");
}

if (!isset($_POST['action']) && empty($_POST['action'])) {
    diePage("Invalid action");
}

switch ($_POST['action']) {
    case 'addFolder':
        $folderName = $_POST['folderName'];
        if (!isset($folderName) || strlen($folderName) < 2) {
            echo "The folder name should big as 2 character";
            die();
        }
        echo addFolder($folderName);
        break;
    default:
        diePage("Invalid Action");
        break;
}
