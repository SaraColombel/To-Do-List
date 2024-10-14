<?php
session_start();

//Récupération de l'url entrée par l'utilisateur
$url = parse_url($_SERVER['REQUEST_URI']);

//Test soit l'url a une route sinon on renvoi à la racine
$path = isset($url['path']) ? $url['path'] : '/';

//MISE EN PLACE DE NOS ROUTES AVEC UN SWITCH
switch($path){
    case '/php/toDoList/Accueil' :
        include './env.php';
        include './model/model_users.php';
        include './manager/managerUser.php';
        include './utilitaire/functions.php';
        include './controler/accueil_controler.php';
        include './view/view_header.php';
        include './view/view_accueil.php';
        break;

    case '/php/toDoList/Categories' :
        include './env.php';
        include './model/model_categories.php';
        include './manager/managerCategories.php';
        include './utilitaire/functions.php';
        include './controler/categories_controler.php';
        include './view/view_header.php';
        include './view/view_categories.php';
        break;

    case '/php/toDoList/Deconnexion' :
        include './env.php';
        include './controler/deco_controler.php';
        break;

    case '/php/toDoList/MonCompte' :
        include './env.php';
        include './model/model_users.php';
        include './manager/managerUser.php';
        include './utilitaire/functions.php';
        include './controler/moncompte_controler.php';
        include './view/view_header.php';
        include './view/view_moncompte.php';
        break;

    case '/php/toDoList/Tasks' :
        include './env.php';
        include './model/model_categories.php';
        include './manager/managerCategories.php';
        include './model/model_tasks.php';
        include './manager/managerTasks.php';
        include './utilitaire/functions.php';
        include './controler/tasks_controler.php';
        include './view/view_header.php';
        include './view/view_task.php';
        break;
    default :
        echo "<h1>404 NOT FOUND</h1>";
        break;
}