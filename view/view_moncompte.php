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

    <style>
        @font-face {
            font-family: Raleway;
            src: url('Raleway.ttf')
        }

        @font-face {
            font-family: LemonMilk;
            src: url('LemonMilk.otf')
        }

        h1,
        h2,
        h3,
        h4,
        a {
            font-family: LemonMilk;
        }

        p,
        h5,
        h6 {
            font-family: Raleway;
        }
    </style>


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
        <h2 class="mb-4 mt-3">Mon Compte</h2>
        <form class="form-group" action="" method="post">

            <!-- Row 1/2 - Nom-->
            <div class="row justify-content-center">
                <div class="col-2">
                    <label for="valueName">
                        <h5>Nom</h5>
                    </label>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-2 mb-4" style="width:20%, font-size:100%">
                    <input type="text" name="valueName" value="<?php echo $_SESSION['name_user'] ?>"
                        class="form-control">
                </div>
            </div>

            <!-- Row 3/4 - Prénom-->
            <div class="row justify-content-center">
                <div class="col-2">
                    <label for="valueFirstName">
                        <h5>Prénom</h5>
                    </label>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-2 mb-4" style="width:20%, font-size:100%">
                    <input type="text" name="valueFirstName" value="<?php echo $_SESSION['first_name_user'] ?> "
                        class="form-control">
                </div>
            </div>

            <!-- Row 5/6 - Email -->
            <div class="row justify-content-center">
                <div class="col-2">
                    <label for="valueEmail">
                        <h5>Email</h5>
                    </label>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-2 mb-5" style="width:20%, font-size:100%">
                    <input type="text" name="valueEmail" value="<?php echo $_SESSION['email_user'] ?>"
                        class="form-control">
                </div>
            </div>

            <!-- Button "Modify"-->
            <!-- <input type="submit" class="btn btn-outline-dark" name="submit" value="Modifier"> -->

            <!-- Button Enregistrer -->
            <input type="submit" class="btn btn-outline-dark mb-3" name="save" value="Enregistrer">

        </form>
        <p class="mt-4" style="font-size:110%"><strong><?php echo $messageModify ?></strong></p>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>