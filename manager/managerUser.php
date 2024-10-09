<?php

class ManagerUser extends ModelUsers
{

    // Function to get back a user from DB
// Param : string
// Return : array | string
    public function readUsersByEmail(): array|string
    {
        $email_user = $this->getEmailUser();
        // 1 - Instantiates the PDO connection object
        $bdd = new PDO('mysql:host=localhost;dbname=task', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

        // try ... catch
        try {
            // 1. Prepare request SELECT
            $req = $bdd->prepare('SELECT id_user, name_user, first_name_user, email_user, password_user FROM users WHERE email_user = ?');

            // 2. Add email in the request by associate "?" with "$email_user" 
            $req->bindParam(1, $email_user, PDO::PARAM_STR);

            // 3. Execute request
            $req->execute();

            // 4. Get back DB response
            $data = $req->fetchAll(PDO::FETCH_ASSOC);

            // 5. Return datas
            return $data;
        } catch (EXCEPTION $error) {
            return $error->getMessage();
        }
    }


    // Function to save form datas in DB
// Param : string $name_user, string $first_name_user, string $email_user, string $password_user
// Return : String
    public function addUser(): string
    {
        $name_user = $this->getNameUser();
        $first_name_user = $this->getFirstNameUser();
        $email_user = $this->getEmailUser();
        $password_user = $this->getPasswordUser();
        // 1 - Instantiates the PDO connection object
        $bdd = new PDO('mysql:host=localhost;dbname=task', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

        // 2 - Try ... catch
        try {

            // 1. Prepare request
            $req = $bdd->prepare('INSERT INTO users (name_user, first_name_user, email_user, password_user)VALUES (?, ?, ?, ?)');

            // 2. Link the "?" to their respective data
            $req->bindParam(1, $name_user, PDO::PARAM_STR);
            $req->bindParam(2, $first_name_user, PDO::PARAM_STR);
            $req->bindParam(3, $email_user, PDO::PARAM_STR);
            $req->bindParam(4, $password_user, PDO::PARAM_STR);

            // 3. Execute request
            $req->execute();

            // 4. Return confirmation message
            return "<h5>Utilisateur enregistré avec succès.</h5>";

        } catch (EXCEPTION $error) {
            return $error->getMessage();
        }
    }


    function readUsers()
    {
        // 1 - Instantiates the PDO connection object
        $bdd = new PDO('mysql:host=localhost;dbname=task', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

        // try ... catch
        try {
            // 1. Prepare request SELECT
            $req = $bdd->prepare('SELECT id_user, name_user, first_name_user, email_user, password_user FROM users');

            // 2. Execute request
            $req->execute();

            // 3. Get back DB response
            $data = $req->fetchAll(PDO::FETCH_ASSOC);

            // 4. Return datas
            return $data;
        } catch (EXCEPTION $error) {
            return $error->getMessage();
        }
        ;
    }

    // Function to modify datas in DB
// Param = string $name_user, string $first_name_user, string $email_user
// Return = String 
    public function modifyInfo(): string
    {
        $modify_name = $this->getNameUser();
        $modify_first_name = $this->getFirstNameUser();
        $modify_email = $this->getEmailUser();
        $bdd = new PDO('mysql:host = localhost; dbname=task', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

        $sessionIdUser = $_SESSION['id_user'];

        try {
            $req = $bdd->prepare("UPDATE users SET name_user = ?, first_name_user = ?, email_user = ? WHERE id_user = $sessionIdUser");
            $req->bindParam(1, $modify_name, PDO::PARAM_STR);
            $req->bindParam(2, $modify_first_name, PDO::PARAM_STR);
            $req->bindParam(3, $modify_email, PDO::PARAM_STR);

            $req->execute();

            return "Informations modifiées avec succès.";
        } catch (EXCEPTION $error) {
            return $error->getMessage();
        }
    }
}