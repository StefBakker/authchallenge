<?php

function getUser($username, $password)
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