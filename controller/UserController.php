<?php

require(ROOT . "model/UserModel.php");

function all() {
    if ( isDocent() == false ) { sendRedirectWithError('U hebt niet de juiste rechten om alle studenten te bekijken.'); return false; }

    render("user/all", array(
        'users' => getAllUsers()
    ));
}

function create() {
    if ( isDocent() == false ) { sendRedirectWithError('U hebt niet de juiste rechten om een student aan te maken.'); return false; }

    render("user/create");
}

function createSave() {
    if ( isDocent() == false ) { sendRedirectWithError('U hebt niet de juiste rechten om een student op te slaan.'); return false; }

    if (!createUser()) {
        header("Location:" . URL . "error/index");
        exit();
    }

    header("Location:" . URL . "user/all");
}


function edit($id)
{
    if ( isDocent() == false ) {
        sendRedirectWithError('U hebt niet de juiste rechten om een student te bewerken.');
        exit;
    }

    $user = getUser($id);
    if (!$user) {
        sendRedirectWithError('Deze gebruiker bestaat niet.');
        exit;
    }

    render("user/edit", array(
        'user' => $user
    ));
}

function editSave()
{
    if ( isDocent() == false ) {
        sendRedirectWithError('U hebt niet de juiste rechten om een student op te slaan.');
        exit;
    }

    if (!editUser()) {
        sendRedirectWithError('Er is een fout opgetreden. De student kon niet verwijderd worden.');
        exit();
    }

    header("Location:" . URL . "user/all");
}


function delete($id)
{
    if ( isDocent() == false ) { sendRedirectWithError('U hebt niet de juiste rechten om een student te verwijderen.'); return false; }

    if (!deleteUser($id)) {
        header("Location:" . URL . "error/index");
        exit();
    }

    header("Location:" . URL . "user/all");
}


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

        $user = checkUser($username, $password);

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

function isDocent() {
    return (isset($_SESSION['userdocent']) && $_SESSION['userdocent'] == 1 );
}

function sendRedirectWithError($message) {
    $_SESSION['errors'][] = $message;
    header("Location:" . URL . 'home/index');
}