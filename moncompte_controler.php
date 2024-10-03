<?php
session_start();

include './model/model_users.php';
include './utilitaire/functions.php';

$emailCo = "";
$passwordCo = "";

if (isset($_SESSION['emailCo']) && isset($_SESSION['passwordCo'])) {
    $emailCo = $_SESSION['emailCo'];
    $passwordCo = $_SESSION['passwordCo'];
}


// Modify personnals informations in "my account"
$messageModify = "";

function modifyFormInspection()
{
    // Check for empty fields
    if (!isset($_POST["valueEmail"]) || empty($_POST["valueEmail"])) {
        return ["valueName" => "", "valueFirstName" => "", "valueEmail" => "", "erreur" => "Veuillez enregistrer un email."];
    }

    // Clean datas
    $modify_name = sanitize($_POST["valueName"]);
    $modify_first_name = sanitize($_POST["valueFirstName"]);
    $modify_email = sanitize($_POST["valueEmail"]);

    // Check for email format
    if (!filter_var($modify_email, FILTER_VALIDATE_EMAIL)) {
        return ["valueName" => "", "valueFirstName" => "", "valueEmail" => "", "erreur" => "L'email n'est pas au bon format."];
    }

    // Return array
    return ["valueName" => $modify_name, "valueFirstName" => $modify_first_name, "valueEmail" => $modify_email];
}


if (isset($_POST["save"])) {
    $tab = modifyFormInspection();
    if ($tab["erreur"] = "") {
        $messageModify = $tab["erreur"];
    } else {
        $messageModify = modifyInfo($tab["valueName"], $tab["valueFirstName"], $tab["valueEmail"]);
        $_SESSION['name_user'] = $tab["valueName"];
        $_SESSION['first_name_user'] = $tab["valueFirstName"];
        $_SESSION['email_user'] = $tab["valueEmail"];
    }
}


include './view/view_header.php';
include './view/view_moncompte.php';