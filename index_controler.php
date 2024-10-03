<?php
session_start();

// J'inclus mes fichiers de ressources (model, fonctions utilitaires)
include './model/model_users.php';
include './utilitaire/functions.php';

$message = "";
$listUser = "";
$messageCo = "";


// formInspection() : Check form datas
// Param : void
// Return : array ["name" => string, "frist_name" => string, "email" => string, "password" => string, "erreur" => string]
function formInspection()
{
    // 1 - Look for empty fields
    if (!isset($_POST["email_user"]) || empty($_POST["email_user"])) {
        return ["name_user" => "", "first_name_user" => "", "email_user" => "", "password_user" => "", "erreur" => "Veuillez enregistrer un email."];
    }

    if (!isset($_POST["password_user"]) || empty($_POST["password_user"])) {
        return ["name_user" => "", "first_name_user" => "", "email_user" => "", "password_user" => "", "erreur" => "Veuillez enregistrer un mot de passe."];
    }


    // 2 - Datas cleaning
    $name_user = sanitize($_POST["name_user"]);
    $first_name_user = sanitize($_POST["first_name_user"]);
    $email_user = sanitize($_POST["email_user"]);
    $password_user = sanitize($_POST["password_user"]);

    // 3 - Verify email format
    if (!filter_var($email_user, FILTER_VALIDATE_EMAIL)) {
        return ["name_user" => '', "first_name_user" => '', "login_user" => '', "password_user" => '', "erreur" => 'Email pas au bon format !'];
    }

    // 4 - Password hashing
    $password_user = password_hash($password_user, PASSWORD_BCRYPT);

    // 5 - Return a tab to have cleaner view of datas
    return ["name_user" => $name_user, "first_name_user" => $first_name_user, "email_user" => $email_user, "password_user" => $password_user, "erreur" => ""];
}


// Function to show users infos
// Param : array["id_user" => INT, "name_user" => string, "first_name_user' => string, "email_user" => string, "password_user" => string]
// Return : String
function cardUser($profil)
{
    return "<article style = 'border-top : 2px solid black'>
        <h5 class='mb-3 mt-4'>Nom - Prénom : <strong>{$profil['name_user']} - {$profil['first_name_user']}</strong></h5>
        <h5 class='mb-4'>Email : {$profil['email_user']}</h5>
    </article>";
}

// Form reception verification
if (isset($_POST["submit"])) {
    $tab = formInspection();
    if ($tab["erreur"] != "") {
        $message = $tab["erreur"];
    } else {
        // Check if email available
        if (empty(readUsersByEmail($tab['email_user']))) {
            // IF yes => Start adding a user
            $message = addUser($tab["name_user"], $tab["first_name_user"], $tab["email_user"], $tab["password_user"]);
        } else {
            $message = "<h5>Cet email existe déjà.</h5>";
        }
    }
}


// USER DISPLAY
// 1 - User recuperation
$users = readUsers();

// 2 - User array traitment, display of all users in it
foreach ($users as $user) {
    $listUser .= cardUser($user);
}

// CONNEXION FORM

// ConnectionFormInspection() : Check form datas
// Param : void
// Return : array ["email" => string, "mot de passe" => string, "erreur" => string]
function connectionFormInspection()
{
    // 1 - Look for empty fields
    if (!isset($_POST["emailCo"]) || empty($_POST["emailCo"])) {
        return ["emailCo" => "", "passwordCo" => "", "erreur" => "Veuillez entrer un email."];
    }
    if (!isset($_POST["passwordCo"]) || empty($_POST["passwordCo"])) {
        return ["emailCo" => "", "passwordCo" => "", "erreur" => "Veuillez entrer un mot de passe."];
    }

    // 2 - Datas cleaning
    $emailCo = sanitize($_POST["emailCo"]);
    $passwordCo = sanitize($_POST["passwordCo"]);

    // 3 - Verify email format
    if (!filter_var($emailCo, FILTER_VALIDATE_EMAIL)) {
        return ["emailCo" => '', "passwordCo" => '', "erreur" => 'Email pas au bon format !'];
    }

    // 4 - Return a tab to have cleaner view of datas
    return ["emailCo" => $emailCo, "passwordCo" => $passwordCo, "erreur" => ""];
}


$emailUser = connectionFormInspection();
$user = readUsersByEmail($emailUser['emailCo']);

if (empty($user)) {
    $messageCo = "Veuillez remplir tous les champs de connexion.";
} else if (password_verify($emailUser['passwordCo'], $user[0]['password_user'])) {
    $_SESSION['id_user'] = $user[0]['id_user'];
    $_SESSION['name_user'] = $user[0]['name_user'];
    $_SESSION['first_name_user'] = $user[0]['first_name_user'];
    $_SESSION['email_user'] = $user[0]['email_user'];
    $messageCo = "Bienvenue, {$_SESSION['first_name_user']}.";
} else {
    $messageCo = "Email ou mot de passe invalide.";
}

// Element disappear when nobody is connected
$display = "d-none";
if (isset($_SESSION['id_user'])) {
    $display = "";
}

// Connection and inscription forms disapear when someone is connected
$displayConnected = "";
if (isset($_SESSION['id_user'])) {
    $displayConnected = "d-none";
}

$homeActive = "active";

// Inclure ma view : view_accueil.php
include './view/view_header.php';
include './view/view_accueil.php';

