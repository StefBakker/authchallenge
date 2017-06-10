<?php

function getUser($id) {
    $db = openDatabaseConnection();

    $sql = "SELECT * FROM users WHERE id = :id";
    $query = $db->prepare($sql);
    $query->execute(array(
        ":id" => $id,
    ));

    $db = null;

    return $query->fetch();
}

function checkUser($username, $password)
{
    $db = openDatabaseConnection();

    $sql = "SELECT * FROM users WHERE name = :username AND password= :password";
    $query = $db->prepare($sql);
    $query->execute(array(
        ":username" => $username,
        ":password" => sha1($password),
    ));

    $db = null;

    // check if query went ok. if an error is found then return 'false' and store errormessage in session
    $error_info = $query->errorInfo();
    if ( $error_info[0] != '00000') {
        // something went wrong
        $_SESSION['errors'][] = $error_info[2];
        return false;
    }

    // check if user was found. if not, return false
    if ( $query->rowCount() != 1 ) {
        $_SESSION['errors'][] = 'user/password combination not found';
        return false;
    }

    // no errors and a user was found. return user.
    return $query->fetch();
}

function getAllUsers() {
    $db = openDatabaseConnection();

    $sql = "SELECT id,name, docent FROM users WHERE docent=0";
    $query = $db->prepare($sql);
    $query->execute(array());

    $db = null;

    return $query->fetchAll();
}

function createUser() {

        $name = isset($_POST['name']) ? $_POST['name'] : null;
        $docent = 0;
        $pass = isset($_POST['password']) ? sha1($_POST['password']) : null;

        if (strlen($name) == 0 || strlen($pass) == 0) {
            return false;
        }

        $db = openDatabaseConnection();

        $sql = "INSERT INTO users(name, password, docent) VALUES (:name, :password, :docent)";
        $query = $db->prepare($sql);
        $query->execute(array(
            ':name' => $name,
            ':password' => $pass,
            ':docent' => $docent));

        $db = null;

        return true;
}

function editUser()
{
    $id = isset($_POST['id']) ? $_POST['id'] : null;
    $name = isset($_POST['name']) ? $_POST['name'] : null;
    $docent = 0;
    $pass = isset($_POST['password']) ? sha1($_POST['password']) : null;

    if (strlen($id) == 0 || strlen($name) == 0 || strlen($pass) == 0) {
        return false;
    }

    $db = openDatabaseConnection();

    $sql = "UPDATE users SET name = :name, password = :password, docent = :docent WHERE id = :id";
    $query = $db->prepare($sql);
    $query->execute(array(
        ':name' => $name,
        ':password' => $pass,
        ':docent' => $docent,
        ':id' => $id));

    $db = null;

    return true;
}


function deleteUser($id = null)
{
    if (!$id) {
        return false;
    }

    $db = openDatabaseConnection();

    $sql = "DELETE FROM users WHERE id=:id ";
    $query = $db->prepare($sql);
    $query->execute(array(
        ':id' => $id));

    $db = null;

    return true;
}