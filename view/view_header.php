<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="./style/style.css" rel="stylesheet" />
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar sticky-top navbar-expand-lg bg-body-tertiary" data-bs-theme="dark" style="font-size:120%">
        <div class="container-fluid">
            <a class="navbar-brand" href="/php/toDoList/Accueil" style="font-size : 120%">To-Do List</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link <?php echo $homeActive ?>" aria-current="page" href="/php/toDoList/Accueil">Accueil</a>
                    <a class="nav-link <?php echo $display?> <?php echo $listActive?>" aria-current="page" href="/php/toDoList/Categories">Catégories</a>
                    <a class="nav-link <?php echo $display ?> <?php echo $taskActive?>" href="/php/toDoList/Tasks">Tâches</a>
                    <a class="nav-link <?php echo $display ?> <?php echo $myAccountActive?>" href="/php/toDoList/MonCompte">Mon compte</a>
                    <a class="nav-link <?php echo $display ?>" href="/php/toDoList/Deconnexion">Déconnexion</a>
                </div>
            </div>
        </div>
    </nav>