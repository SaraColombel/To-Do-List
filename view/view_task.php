<h1 class="ps-3 mt-3 mb-3 text-center">Mes tâches</h1>
<h2 class="ps-3 mb-3 text-center">Ajouter une tâche</h2>
<div class="container-fluid d-flex justify-content-center text-center">
    <div class="row ">
        <form method="POST">
            <div class="input-group col mb-2">
                <input type="text" class="form-control" placeholder="Nom" aria-label="Nom de la tâche"
                    aria-describedby="addon-wrapping">
            </div>

            <input class="col-3 mb-2 w-100" type="date" name="date_task" placeholder="Date">

            <div class="input-group col mb-2" >
                    <label class="input-group-text" for="inputGroupSelect01">Catégorie</label>
                    <select class="form-select" id="inputGroupSelect01 inputGroup-sizing-default" >
                        <option selected>Choisir...</option>
                        <option><?php echo $optCategories ?></option>
                    </select>
                </div>

            <div class="input-group col mb-2" name="content_task">
                <span class="input-group-text" id="inputGroup-sizing-sm">Description</span>
                <input type="text" class="form-control" aria-label="description"
                    aria-describedby="inputGroup-sizing-sm">
            </div>

            <button type="submit" class="btn btn-dark col mb-2" name="ajouterTask">Ajouter</button>
            <!-- <input type="submit" name="ajouterTask"> -->
        </form>
    </div>
</div>
<h5 class="ps-3 mt-2 mb-3 text-center"><?php echo $message ?></h5>
<section>
    <h2 class="ps-3 mb-2 text-center">Liste des Tâches</h2>
    <h6 class="ps-3 text-center"><?php echo $listTasks ?></h6>
</section>
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html>