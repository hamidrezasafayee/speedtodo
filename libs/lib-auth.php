<?php
function getUserId()
{
    return getLoggedInUser()->id ?? 0;
}

function isLoggedIn()
{
    return isset($_SESSION['user']) ? true : false;
}

function register($userData)
{
    global $pdo;
    $pass = password_hash($userData['password'], PASSWORD_BCRYPT);
    $sql = "INSERT INTO users (name,email,password) VALUES (:name,:email,:password)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':name' => $userData['name'],
        ':email' => $userData['email'],
        ':password' => $pass
    ]);
    return $stmt->rowCount() ? true : false;
}

function login($email, $pass)
{
    # check email
    $user = getUserByEmail($email);
    if ($user == null) {
        return false;
    }
    # check password
    if (password_verify($pass, $user->password)) {
        loginSession($user);
        return true;
    }
    return false;
}

function getUserByEmail($email)
{
    global $pdo;
    $sql = "SELECT * FROM users WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':email' => $email
    ]);
    $records = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $records[0] ?? null;
}

function loginSession($user)
{
    $_SESSION['user'] = $user;
}

function getLoggedInUser()
{
    if (isLoggedIn()) {
        return $_SESSION['user'];
    }else{
        return null;
    }
}

function logout()
{
    unset($_SESSION['user']);
}