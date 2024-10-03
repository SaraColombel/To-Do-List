<?php

    // Function to save form datas in DB
    // Param : string $name_category
    // Return : String
function addCategory($name_category)
{
    // 1 - Instantiates the PDO connection object
    $bdd = new PDO('mysql:host=localhost;dbname=task', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

    // 2 - Try ... catch
    try {

        // 1. Prepare request
        $req = $bdd->prepare('INSERT INTO categories (name_category)VALUES (?)');

        // 2. Link the "?" to their respective data
        $req->bindParam(1, $name_category, PDO::PARAM_STR);

        // 3. Execute request
        $req->execute();

        // 4. Return confirmation message
        return "<h5>Catégorie enregistrée avec succès.</h5>";

    } catch (EXCEPTION $error) {
        return $error->getMessage();
    }
}

// Function to get back a category name from DB
// Param : string
// Return : array | string
function readCategories()
{
    // 1 - Instantiates the PDO connection object
    $bdd = new PDO('mysql:host=localhost;dbname=task', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

    // try ... catch
    try {
        // 1. Prepare request SELECT
        $req = $bdd->prepare('SELECT name_category FROM categories');

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

