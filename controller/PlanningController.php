<?php

require(ROOT . "model/PlanningModel.php");
require(ROOT . "model/UserModel.php");

/*
highlight_string("<?php\n\$data =\n" . var_export($exam_ids, true) . ";\n?>");
*/


function all() {
    if ( isDocent() == false ) { sendRedirectWithError('U hebt niet de juiste rechten om alle geplande examens te zien.'); return false; }

    render("planning/all", array(
        'planning' => getFullPlanning()
    ));
}

// TOON leeg invulscherm
function create() {
    render("planning/create", array(
        'exam_id_names' => getExamIdName(),
        'student_id_names' => getAllUsers(),
    ) );
}

function createSave() {
    $_SESSION['previous_post_data'] = $_POST;

    if (! createPlanning() ) {
        // spring terug naar invoerscherm
        header("Location: " . $_SERVER['HTTP_REFERER']);
    } else {
        header("Location:" . URL . 'planning/all');
    }
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