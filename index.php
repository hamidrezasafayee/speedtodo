<?php
include "bootstrap/init.php";

if (isset($_GET['delete_folder']) && is_numeric($_GET['delete_folder'])) {
    $deleteCount = removeFolder($_GET['delete_folder']);
}

# get tasks and folders
$folders = getFolders();

# include view 
include "tpl/tpl-index.php";