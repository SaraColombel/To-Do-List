<?php

class ManagerTasks extends ModelTasks
{
    //Fonction pour ajouter une tâche
//Param :
//Return : string
    function addTask()
    {

        $name_task = $this->getNameTask();
        $content_task = $this->getContentTask();
        $date_task = $this->getDateTask();
        $id_user = $this->getIdUser();
        $id_category = $this->getIdCategory();

        //1Er Etape : Instancier l'objet de connexion PDO
        $bdd = new PDO('mysql:host=localhost;dbname=task', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

        //Try...Catch
        try {
            //2nd Etape : préparer ma requête INSERT INTO
            $req = $bdd->prepare('INSERT INTO tasks (nom_task, content_task, date_task, id_user, id_category) VALUES (?,?,?,?,?)');

            //3eme Etape : Binding de Paramètre pour relier chaque ? à sa donnée
            $req->bindParam(1, $name_task, PDO::PARAM_STR);
            $req->bindParam(2, $content_task, PDO::PARAM_STR);
            $req->bindParam(3, $date_task, PDO::PARAM_STR);
            $req->bindParam(4, $id_user, PDO::PARAM_INT);
            $req->bindParam(5, $id_category, PDO::PARAM_INT);

            //4eme Etape : exécution de la requête
            $req->execute();

            //5eme Etape : Retourne un message de confirmation
            return "$name_task , a été enregistré avec succès !";
        } catch (EXCEPTION $error) {
            return $error->getMessage();
        }
    }


    //Fonction pour afficher la liste des taks selon l'id_user
//Param : int
//Return : array | string
    function readTasksByUser()
    {
        $id_user = $this->getIdUser();
        //1Er Etape : Instancier l'objet de connexion PDO
        $bdd = new PDO('mysql:host=localhost;dbname=task', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

        //Try...Catch
        try {
            //2nd Etape : préparer ma requête SELECT
            $req = $bdd->prepare('SELECT id_task, nom_task, content_task, date_task, id_user, tasks.id_category, name_category FROM tasks INNER JOIN categories ON tasks.id_category = categories.id_category WHERE id_user = ?');

            //3eme Etape : Binding de Paramètre pour relier chaque ? à sa donnée
            $req->bindParam(1, $id_user, PDO::PARAM_INT);

            //4eme Etape : exécution de la requête
            $req->execute();

            //5eme Etape : Retourne la réponse de la BDD
            return $req->fetchAll(PDO::FETCH_ASSOC);

        } catch (EXCEPTION $error) {
            return $error->getMessage();
        }
    }
}
