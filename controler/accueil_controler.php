<?php

class ControlerAccueil{
    private ?string $message;
    private ?string $messageCo;
    private ?string $listUser;

    public function __construct(){
        //Déclaration des variables d'affichages

        $this->message = "";
        $this->messageCo = "";
        $this->listUser = "";  
    }

        //Getter et Setter
        public function getMessage(): ?string { return $this->message; }
        public function setMessage(?string $message): self { $this->message = $message; return $this; }
    
        public function getMessageCo(): ?string { return $this->messageCo; }
        public function setMessageCo(?string $messageCo): self { $this->messageCo = $messageCo; return $this; }
    
        public function getListUser(): ?string { return $this->listUser; }
        public function setListUser(?string $listUser): self { $this->listUser = $listUser; return $this; }


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
function cardUser(?array $profil)
{
    return "<article style = 'border-top : 2px solid black'>
        <h5 class='mb-3 mt-4'>Nom - Prénom : <strong>{$profil['name_user']} - {$profil['first_name_user']}</strong></h5>
        <h5 class='mb-4'>Email : {$profil['email_user']}</h5>
    </article>";
}


// Form reception verification
    public function registerUser()
    {
        if (isset($_POST["submit"])) {
            $tab = $this->formInspection();
            if ($tab["erreur"] != "") {
                $this->setMessage($tab["erreur"]);
            } else {
                $newUser = new ManagerUser($tab['email_user']);

                $newUser->setFirstNameUser($tab['first_name_user'])->setNameUser($tab['name_user'])->setPasswordUser($tab['password_user']);
                // Check if email available
                if (empty($newUser->readUsersByEmail())) {
                    // IF yes => Start adding a user
                    $this->setMessage($newUser->addUser());
                } else {
                    $this->setMessage("<h5>Cet email existe déjà.</h5>");
                }
            }
        }
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

    //Test si le formulaire de connexion m'est envoyé
    public function logInUser(): void
    {
        if (isset($_POST['connexion'])) {
            //je teste les données de connexion envoyés
            $tab = $this->connectionFormInspection();

            //je regarde si je suis dans le cas d'erreur
            if ($tab['erreur'] != '') {
                //si c'est le cas : j'affiche l'erreur
                $this->setMessageCo($tab['erreur']);
            } else {
                //Si tout s'est bien passé :
                //Création de mon objet $user à partir du ModelUser
                $user = new ManagerUser($tab['emailCo']);

                //Interroger la BDD pour récupérer les données de l'utilisateurs à partir du login entré
                $data = $user->readUsersByEmail();

                //Tester si je suis dans le cas d'erreur (problème de communication avec la BDD)
                //Si c'est le cas, je reçois un string, si tout s'est passé je reçois un array
                if (gettype($data) == 'string') {
                    $this->setMessageCo($data);
                } else {
                    //Tout s'est bien passé
                    //Je vérifie la réponse de la BDD : vide ou pas ?
                    //Si c'est vide : alors le login n'existe pas en BDD, et j'affiche un message d'erreur
                    if (empty($data)) {
                        $this->setMessageCo("Erreur dans l'email et/ou dans le mot de passe.");
                    } else {
                        //Si on trouve le login en BDD
                        //Je vérifie la correspondance des mots de passe
                        if (!password_verify($tab['passwordCo'], $data[0]['password_user'])) {
                            //Si les mots de passe ne correspondent pas, j'affiche un message d'erreur
                            $this->setMessageCo("Erreur dans l'email et/ou dans le mot de passe.");
                        } else {
                            //Si les mots de passe correspondent, j'enregistre les données de l'utilisateur en SESSION, et j'affiche un message de confimation
                            $_SESSION['id_user'] = $data[0]['id_user'];
                            $_SESSION['name_user'] = $data[0]['name_user'];
                            $_SESSION['first_name_user'] = $data[0]['first_name_user'];
                            $_SESSION['email_user'] = $data[0]['email_user'];

                            $this->setMessageCo("{$_SESSION['email_user']} est connecté avec succés !");
                        }
                    }
                }
            }
        }
    }


    // USER DISPLAY
    // 1 - User recuperation
    public function displayListUsers(): void
    {
        $ModelUser = new ManagerUser(null);
        $users = $ModelUser->readUsers();

        // 2 - User array traitment, display of all users in it
        foreach ($users as $user) {
            $this->setListUser($this->getListUser() . $this->cardUser($user));
        }
    }
}

//J'instancie mon Controller
$controlerAccueil = new ControlerAccueil();
$controlerAccueil->displayListUsers();
$controlerAccueil->logInUser();
$controlerAccueil->registerUser();

$displayConnected = "";
$display = "d-none";
// Element disappear when nobody is connected
if (isset($_SESSION['id_user'])) {
    $display = "";
}

// Connection and inscription forms disapear when someone is connected
if (isset($_SESSION['id_user'])) {
    $displayConnected = "d-none";
}

$homeActive = "active";

