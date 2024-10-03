<!-- Body -->

<div class="">
    <div class="<?php echo $display?> d-flex justify-content-center">
        <h1 class="">Bonjour <?php echo $_SESSION['first_name_user']?>. Nous vous attendions.</h1>
    </div>
</div>

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
                <div class="col-4 mt-3">
                    <input type="submit" class="btn btn-outline-dark" name="connexion" value="Connexion">
                </div>
            </div>
        </form>
        <p class="mt-4" style="font-size:110%"><?php echo $messageCo ?></p>
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