<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <style>
        @font-face {
            font-family: Raleway;
            src: url('/fonts/Raleway.ttf')
        }

        @font-face {
            font-family: LemonMilk;
            src: url('/fonts/LemonMilk.otf')
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

    <!-- Navbar -->
    <nav class="navbar sticky-top navbar-expand-lg bg-body-tertiary" data-bs-theme="dark" style="font-size:120%">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php" style="font-size : 120%">To-Do List</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="index.php">Accueil</a>
                    <a class="nav-link <?php echo $display ?>" href="moncompte.php">Mon compte</a>
                    <a class="nav-link <?php echo $display ?>" href="deco.php">Déconnexion</a>
                </div>
            </div>
        </div>
    </nav>


    <!--Connection fields-->
    <div class="container-fluid text-center <?php echo $displayConnected ?>">
        <h2 class="mb-4 mt-3 text-center">Connexion</h2>
        <form class="form-group" action="" method="post">
            <div class="row justify-content-center">
                <div class="col-2 mb-3">
                    <input type="text" name="emailCo" placeholder="Email" class="form-control">
                </div>

                <div class="col-2 mb-3">
                    <input type="password" name="passwordCo" placeholder="Mot de passe" class="form-control">
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-3 mt-3">
                    <input type="submit" class="btn btn-outline-dark" name="connexion" value="Connexion">
                </div>
            </div>
        </form>
        <p class="mt-4" style="font-size:110%"><strong><?php echo $messageCo ?></strong></p>
    </div>


    <!-- Inscription field -->
    <div class="container-fluid text-center pb-3 pt-1 position-absolute <?php echo $displayConnected ?>" style="background-color:lightpink">
        <h2 class="mb-4 mt-3 text-center">Inscription</h2>
        <form class="form-group" action="" method="post">
            <div class="row justify-content-center">
                <div class="col-2 mb-3">
                    <input type="text" name="name_user" placeholder="Nom" class="form-control">
                </div>

                <div class="col-2 mb-3">
                    <input type="text" name="first_name_user" placeholder="Prénom" class="form-control">
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-2 mb-3">
                    <input type="text" name="email_user" placeholder="Email" class="form-control">
                </div>

                <div class="col-2 mb-3">
                    <input type="password" name="password_user" placeholder="Mot de passe" class="form-control">
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-4 mt-3">
                    <input type="submit" class="btn btn-light" name="submit" value="Ajouter +">
                </div>
            </div>
        </form>
        <p class="mt-4" style="font-size:110%"><strong><?php echo $message ?></strong></p>
        <div class="d-flex justify-content-center">
            <div class="col-4 text-center">
                <?php echo $listUser ?>
            </div>
        </div>
    </div>


    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>