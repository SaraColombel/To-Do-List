<?php

$message = "";
$listUser = "";

// Sanitize() : Clean the datas, removing HTML, SCRIPT JS, PHP, and space at begining and ending from datas
// Param : $data --> String
// Return : String
function sanitize($data){
    return htmlentities(strip_tags(stripslashes(trim($data))));
};

// formInspection() : Check form datas
// Param : void
// Return : array ["name" => string, "frist_name" => string, "email" => string, "password" => string, "erreur" => string]
function formInspection(){

    // 1 - Look for empty fields
    if(!isset($_POST["email_user"]) || empty($_POST["email_user"])){
        return ["name_user" => "", "first_name_user" => "", "email_user" => "", "password_user" => "", "erreur" => "Veuillez enregistrer un email."];
    };
    if(!isset($_POST["password_user"]) || empty($_POST["password_user"])){
        return ["name_user" => "", "first_name_user" => "", "email_user" => "", "password_user" => "", "erreur" => "Veuillez enregistrer un mot de passe."];
    };

    // 2 - Datas cleaning
    $name_user = sanitize($_POST["name_user"]);
    $first_name_user = sanitize($_POST["first_name_user"]);
    $email_user = sanitize($_POST["email_user"]);
    $password_user = sanitize($_POST["password_user"]);

    // 3 - Verify email format
    if(!filter_var($email_user,FILTER_VALIDATE_EMAIL)){
        return ["name_user"=>'',"first_name_user"=>'',"login_user"=>'',"password_user"=>'',"erreur"=>'Email pas au bon format !'];
    }

    // 4 - Password hashing
    $password_user = password_hash($password_user,PASSWORD_BCRYPT);

    // 5 - Return a tab to have cleaner view of datas
    return ["name_user" => $name_user, "first_name_user" => $first_name_user, "email_user" => $email_user, "password_user" => $password_user, "erreur" => ""];
};

// Function to save form datas in DB
// Param : string $name_user, string $first_name_user, string $email_user, string $password_user
// Return : String
function addUser($name_user, $first_name_user, $email_user, $password_user){

    // 1 - Instantiates the PDO connection object
    $bdd = new PDO('mysql:host=localhost;dbname=task', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

    // 2 - Try ... catch
    try{

        // 1. Prepare request
        $req = $bdd -> prepare('INSERT INTO users (name_user, first_name_user, email_user, password_user)VALUES (?, ?, ?, ?)');

        // 2. Link the "?" to their respective data
        $req -> bindParam(1, $name_user, PDO::PARAM_STR);
        $req -> bindParam(2, $first_name_user, PDO::PARAM_STR);
        $req -> bindParam(3, $email_user, PDO::PARAM_STR);
        $req -> bindParam(4, $password_user, PDO::PARAM_STR);

        // 3. Execute request
        $req -> execute();

        // 4. Return confirmation message
        return "<h5>Utilisateur enregistré avec succès.</h5>";

    } catch (EXCEPTION $error) {
        return $error -> getMessage();
    };
};

// Function to get back a user from DB
// Param : string
// Return : array | string
function readUsersByEmail($email_user){
        // 1 - Instantiates the PDO connection object
        $bdd = new PDO('mysql:host=localhost;dbname=task', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

        // try ... catch
        try{
            // 1. Prepare request SELECT
            $req=$bdd->prepare('SELECT id_user, name_user, first_name_user, email_user, password_user FROM users WHERE email_user = ?');

            // 2. Add email in the request by associate "?" with "$email_user" 
            $req -> bindParam(1, $email_user, PDO::PARAM_STR);

            // 3. Execute request
            $req -> execute();

            // 4. Get back DB response
            $data = $req -> fetchAll(PDO::FETCH_ASSOC);

            // 5. Return datas
            return $data;
        } catch(EXCEPTION $error){
            return $error->getMessage();
        };
};

function readUsers(){
    // 1 - Instantiates the PDO connection object
    $bdd = new PDO('mysql:host=localhost;dbname=task', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

    // try ... catch
    try{
        // 1. Prepare request SELECT
        $req=$bdd->prepare('SELECT id_user, name_user, first_name_user, email_user, password_user FROM users');

        // 2. Execute request
        $req -> execute();

        // 3. Get back DB response
        $data = $req -> fetchAll(PDO::FETCH_ASSOC);

        // 4. Return datas
        return $data;
    } catch(EXCEPTION $error){
        return $error->getMessage();
    };
};

// Function to show users infos
// Param : array["id_user" => INT, "name_user" => string, "first_name_user' => string, "email_user" => string, "password_user" => string]
// Return : String
function cardUser($profil){
    return "<article style = 'border-top : 2px solid black' class='me-5'>
        <h5 class='mt-4'><strong>Nom - Prénom :</strong> {$profil['name_user']} - {$profil['first_name_user']}</h5>
        <h6 class='mb-4'>Email : {$profil['email_user']}</h6>
    </article>";
};

// Form reception verification
if(isset($_POST["submit"])){
    $tab = formInspection();
    if($tab["erreur"] != ""){
        $message = $tab["erreur"];
    } else {
        // Check if email available
        if(empty(readUsersByEmail($tab['email_user']))){
        // IF yes => Start adding a user
            $message = addUser($tab["name_user"], $tab["first_name_user"], $tab["email_user"], $tab["password_user"]);
        }else {
            $message = "<h5>Cet email existe déjà.</h5>";
        }
    }
}

// User display
// 1 - User recuperation
$users = readUsers();

// 2 - User array traitment, display of all users in it
foreach($users as $user){
    $listUser .= cardUser($user);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid text-center pb-3 pt-1 position-absolute" style="background-color:lightpink">
    <h2 class="mb-4 mt-3 text-center">Inscription</h2>
            <form class="form-group" action="" method="post" >
                <div class="row justify-content-center">
                    <div class="col-2 mb-3">
                        <input type="text" name="name_user" placeholder="Nom" class="form-control">
                    </div>

                    <div class="col-2 mb-3">
                        <input type="text" name="first_name_user" placeholder="Prénom" class="form-control">
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-2">
                        <input type="text" name="email_user" placeholder="Email" class="form-control">
                    </div>

                    <div class="col-2">
                        <input type="text" name="password_user" placeholder="Mot de passe" class="form-control">
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-3 mt-4">
                        <input type="submit" class="btn btn-light" name="submit" value="Ajouter +">
                    </div>
                </div>
            </form>
            <p class="mt-4" style="font-size:110%"><strong><?php echo $message ?></strong></p>
            <section>
            <?php echo $listUser ?>
    </section>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>