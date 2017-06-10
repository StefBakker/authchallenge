<?php

require(ROOT . "model/UserModel.php");

function login()
{
    render("user/login");
}

function logout() {
    unset($_SESSION['username']);
    unset($_SESSION['userdocent']);

    header('location: ' . URL . 'home/index');
}

function loginProcess()
{
    if ( isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $user = GetUser($username, $password);
        //var_export( $user);
        //die();

        if ($user == false) {
            // login error; redirect to login form
            $_SESSION['errors'][] = 'Kon niet inloggen. Probeer het opnieuw.';
            header('location: ' . URL . 'user/login');
        } else {
            // user found. store username and level in session
            $_SESSION['username'] = $user['name'];
            $_SESSION['userdocent'] = $user['docent'];
        }
    } else {
        $_SESSION['errors'][] = 'Vul alstublieft een gebruikersnaam en wachtwoord in.';
        header('location: ' . URL . 'user/login');
    }

    header('location: ' . URL . 'home/index');
}