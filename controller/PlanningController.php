<?php

require(ROOT . "model/PlanningModel.php");

function all() {
    if ( isDocent() == false ) { sendRedirectWithError('U hebt niet de juiste rechten om alle geplande examens.'); return false; }

    render("planning/all", array(
        'planning' => getFullPlanning()
    ));
}

function student() {
    render("planning/student", array(
        'planning' => getPlanningForLoggedinUser()
    ));
}

function confirm($id) {
    $previous_url = $_SERVER['HTTP_REFERER'];

    if (updatePlanning($id, 1)) {
        $_SESSION['info'][] = 'Examen bevestigd.';
    } else {
        $_SESSION['errors'][] = 'Kon niet bevestigen.';
    }

    header("Location:" . $previous_url);
}

function reject($id) {
    $previous_url = $_SERVER['HTTP_REFERER'];

    if (updatePlanning($id, 2)) {
        $_SESSION['info'][] = 'Examen geweigerd.';
    } else {
        $_SESSION['errors'][] = 'Kon niet weigeren.';
    }

    header("Location:" . $previous_url);
}

function success($id) {
    $previous_url = $_SERVER['HTTP_REFERER'];

    if (updatePlanning($id, 3, 2)) {
        $_SESSION['info'][] = 'Geslaagd voor examen.';
    } else {
        $_SESSION['errors'][] = 'Kon niet op geslaagd zetten.';
    }

    header("Location:" . $previous_url);
}

function fail($id) {
    $previous_url = $_SERVER['HTTP_REFERER'];

    if (updatePlanning($id, 3, 1)) {
        $_SESSION['info'][] = 'Gezakt voor examen.';
    } else {
        $_SESSION['errors'][] = 'Kon niet op gezakt zetten.';
    }

    header("Location:" . $previous_url);
}


function isDocent() {
    return (isset($_SESSION['userdocent']) && $_SESSION['userdocent'] == 1 );
}

function sendRedirectWithError($message) {
    $_SESSION['errors'][] = $message;
    header("Location:" . URL . 'home/index');
}