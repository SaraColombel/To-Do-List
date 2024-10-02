<?php
session_start();

$emailCo = "";
$passwordCo = "";

if(isset($_SESSION['emailCo']) && isset($_SESSION['passwordCo'])){
    $emailCo = $_SESSION['emailCo'];
    $passwordCo = $_SESSION['passwordCo'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Compte</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar sticky-top navbar-expand-lg bg-body-tertiary" data-bs-theme="dark" style="font-size:120%">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php" style="font-size : 120%">To-Do List</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link" aria-current="page" href="index.php">Accueil</a>
                    <a class="nav-link active" href="moncompte.php">Mon compte</a>
                    <a class="nav-link" href="deco.php">Déconnexion</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container-fluid text-center">
        <h2 class="mb-4 mt-3 text-center">Mon Compte</h2>
        <form class="form-group" action="" method="post">
            <div class="row justify-content-center">
                <div class="col-2 mb-3">
                    <p>Nom : <?php echo $_SESSION['name_user']?></p>
                    <p>Prénom : <?php echo $_SESSION['first_name_user']?></p>
                    <p>Email : <?php echo $_SESSION['email_user']?></p>
                </div>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>
