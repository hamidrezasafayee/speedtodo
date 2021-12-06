<?php
include "bootstrap/init.php";

if (isset($_GET['logout']) && is_numeric($_GET['logout'])) {
    logout();
}

if (!isLoggedIn()) {
    header("location:".siteUrl('auth.php'));
}

if (isset($_GET['delete_folder']) && is_numeric($_GET['delete_folder'])) {
    $deleteCount = removeFolder($_GET['delete_folder']);
}

if (isset($_GET['delete_task']) && is_numeric($_GET['delete_task'])) {
    $deleteCount = removeTask($_GET['delete_task']);
}

# get tasks and folders
$folders = getFolders();
$tasks = getTasks();

# include view 
include "tpl/tpl-index.php";