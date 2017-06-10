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
        FROM planning
            JOIN users on planning.student_id = users.id
            JOIN exams on planning.exam_id = exams.id
            JOIN company on planning.company_id = company.id
            JOIN examiners as `examiners_1` on planning.`examiner_1_id` = examiners_1.id
            JOIN examiners as `examiners_2` on planning.`examiner_2_id` = examiners_2.id
    ";
}