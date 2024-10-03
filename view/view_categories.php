<!-- Body -->

    <!-- Inscription field -->
    <div class="container-fluid text-center pb-3 pt-1 position-absolute" style="background-color:lightpink">
        <h2 class="mb-4 mt-3 text-center">Ajout d'une catégorie</h2>
        <form class="form-group" action="" method="post">
            <div class="row justify-content-center">
                <div class="col-2 mb-3">
                    <input type="text" name="name_category" placeholder="Nom de la catégorie" class="form-control">
                </div>

                <div class="col-2">
                    <input type="submit" class="btn btn-light" name="submit" value="Ajouter +">
                </div>
            </div>
        </form>
        <p class="mt-4" style="font-size:110%"><strong><?php echo $messageCategories ?></strong></p>
        <div class="d-flex justify-content-center">
            <div class="col-4 text-center">
                <ul class="list-group list-group-numbered">
                <?php echo $listCategories ?>
                </ul>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>