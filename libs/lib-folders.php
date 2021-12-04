<?php 
function getFolders()
{
    global $pdo;
    $user_id = getUserId();
    $sql = "SELECT * FROM folders WHERE user_id = :user_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':user_id' => $user_id
    ]);
    $records = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $records;
}

function addFolder($folderName)
{
    global $pdo;
    $user_id = getUserId();
    $sql = "INSERT INTO folders (name,user_id) VALUES (:name, :user_id)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':name' => $folderName,
        ':user_id' => $user_id
    ]);
    return $stmt->rowCount();
}

function removeFolder($folderId)
{
    global $pdo;
    $user_id = getUserId();
    $sql = "DELETE FROM folders WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':id' => $folderId,
    ]);
    return $stmt->rowCount();
}