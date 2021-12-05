<?php

function getTasks()
{
    global $pdo;
    $user_id = getUserId();
    $folder_id = $_GET['folder_id'] ?? null;
    $folderCondition = null;
    if (isset($_GET['folder_id'])) {
        $folderCondition = "and folder_id = $folder_id";
    }
    $sql = "SELECT * FROM tasks WHERE user_id = :user_id {$folderCondition}";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'user_id' => $user_id,
    ]);
    $records = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $records;
}

function addTask($taskTitle, $folder_id)
{
    global $pdo;
    $user_id = getUserId();
    $sql = "INSERT INTO tasks (title,user_id,folder_id) VALUES (:title,:user_id,:folder_id)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':title' => $taskTitle,
        ':user_id' => $user_id,
        'folder_id'=> $folder_id
    ]);
    return $stmt->rowCount();
}

function removeTask(int $task_id)
{
    global $pdo;
    $user_id = getUserId();
    $sql = "DELETE FROM tasks WHERE id = :task_id and user_id = :user_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':task_id' => $task_id,
        ':user_id' => $user_id
    ]);
}   

function taskStatus($task_id)
{
    global $pdo;
    $user_id = getUserId();
    $sql = "UPDATE tasks SET is_done = 1 - is_done WHERE id = :task_id AND user_id = :user_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':task_id' => $task_id,
        ':user_id' => $user_id
    ]);
    return $stmt->rowCount();
}