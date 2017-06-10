<?php

function getFullPlanning() {
    $db = openDatabaseConnection();

    $sql = _sql();
    $query = $db->prepare($sql);
    $query->execute(array());

    $db = null;

    return $query->fetchAll();
}

function getPlanningForLoggedinUser()
{
    $db = openDatabaseConnection();

    $current_user = (isset($_SESSION['userid']) ? $_SESSION['userid'] : null);
    if (!$current_user) return false;

    $sql = _sql() . " WHERE planning.student_id = :id";
    $query = $db->prepare($sql);
    $query->execute(array(
        ':id' => $current_user,
    ));
    $db = null;

    return $query->fetchAll();
}

function getPlanning($id)
{
    $db = openDatabaseConnection();

    $sql = _sql() . " WHERE planning.id = :id";
    $query = $db->prepare($sql);
    $query->execute(array(
        ':id' => $id,
    ));
    $db = null;

    return $query->fetch();
}

function updatePlanning($id, $newstatus, $newresult = 0) {
    $plan = getPlanning($id);

    //var_export($plan);
    //die();

    if (!$plan) return false;

    $db = openDatabaseConnection();

    $sql = "UPDATE planning SET status_id = :status, result_id = :result WHERE id = :id";
    $query = $db->prepare($sql);
    $query->execute(array(
        ':id' => $id,
        ':status' => $newstatus,
        ':result' => $newresult,
    ));

    // check if query went ok. if an error is found then return 'false' and store errormessage in session
    $error_info = $query->errorInfo();
    if ( $error_info[0] != '00000') {
        // something went wrong
        $_SESSION['errors'][] = $error_info[2];
        return false;
    }

    $db = null;

    return true;
}

function _sql() {
    return "
        SELECT 
            planning.*
            ,users.name as `student.name`
            ,exams.name as `exam_name`
            ,company.name as `company.name`
            ,company.city as `company.city`
            ,company.address as `company.address`
            ,examiners_1.code as `examiner1.code`
            ,examiners_2.code as `examiner2.code`
            ,results.name as `result.name`
            ,results.class as `result.class`
            ,status.name as `status.name`
            ,status.class as `status.class`
        FROM planning
            JOIN users on planning.student_id = users.id
            JOIN exams on planning.exam_id = exams.id
            JOIN company on planning.company_id = company.id
            JOIN examiners as `examiners_1` on planning.`examiner_1_id` = examiners_1.id
            JOIN examiners as `examiners_2` on planning.`examiner_2_id` = examiners_2.id
            JOIN results on planning.`result_id` = results.id
            JOIN status on planning.`status_id` = status.id
    ";
}