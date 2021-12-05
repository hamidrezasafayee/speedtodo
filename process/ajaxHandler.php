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

    case 'addTask':
        $taskTitle = $_POST['taskTitle'];
        $folder_id = $_POST['folder_id'];
        if (!isset($taskTitle) || strlen($taskTitle) < 2) {
            echo "The task name should big as 2 character";
            die();
        }
        echo addTask($taskTitle, $folder_id);
        break;
    case 'taskStatus':
        $taskId = $_POST['taskId'];
        echo taskStatus($taskId);
        break;
    default:
        diePage("Invalid Action");
        break;
}
