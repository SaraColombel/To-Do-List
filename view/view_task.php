<main>
    <h1>Mes Tâches</h1>
    <section>
        <h2>Ajouter une Tâche</h2>
        <form action="" method="POST">
            <input type="text" name="nom_task" placeholder="Nom de la Tâche">
            <input type="date" name="date_task" placeholder="Date">
            <select name="id_category">
                <?php echo $optCategories ?>
            </select>
            <textarea name="content_task" placeholder="Description de la tâche">
            </textarea>
            <input type="submit" name="ajouterTask">
        </form>
        <p><?php echo $message ?></p>
    </section>
    <section>
        <h2>Liste des Tâches</h2>
        <?php echo $listeTasks ?>
    </section>
</main>
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>