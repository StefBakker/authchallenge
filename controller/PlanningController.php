<?php

require(ROOT . "model/PlanningModel.php");

function all() {
    if ( isDocent() == false ) { sendRedirectWithError('U hebt niet de juiste rechten om alle geplande examens.'); return false; }

    render("planning/all", array(
        'planning' => getFullPlanning()
    ));
}

function student() {
    render("planning/all", array(
        'planning' => getPlanningForLoggedinUser()
    ));
}

function isDocent() {
    return (isset($_SESSION['userdocent']) && $_SESSION['userdocent'] == 1 );
}

function sendRedirectWithError($message) {
    $_SESSION['errors'][] = $message;
    header("Location:" . URL . 'home/index');
}