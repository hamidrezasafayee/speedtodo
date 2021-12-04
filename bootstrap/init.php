<?php
include "constants.php";
include BASE_PATH."bootstrap/config.php";
include BASE_PATH."libs/helper.php";

$dsn = "mysql:dbname={$db};host={$host}";
try {
    $pdo = new PDO($dsn,$user,$password);
} catch (PDOException $e) {
    diePage("Connection Faild: ".$e->getMessage());
}

include BASE_PATH."libs/lib-auth.php";
include BASE_PATH."libs/lib-folders.php";
include BASE_PATH."libs/lib-tasks.php";
