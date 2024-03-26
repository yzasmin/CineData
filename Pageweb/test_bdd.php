<<<<<<< HEAD
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>
</head>
<body>
    <header>
        <h1>Test</h1>
        <?php
        // Inclure le fichier contenant la fonction de connexion à la base de données
        include 'based.php';

        // Maintenant, vous pouvez utiliser la fonction getBD() pour obtenir une connexion à la base de données
        $bdd = getBD();

        // Vous pouvez ensuite exécuter vos requêtes SQL normalement en utilisant $bdd

        // Par exemple, récupérons les données d'une table nommée 'utilisateurs' :
        $query = $bdd->query("SELECT * FROM movie_data WHERE title = 'Star Wars';");

        // Vous pouvez maintenant parcourir les résultats comme d'habitude
        while ($row = $query->fetch()) {
            echo "Title: " . $row['title'] . "<br>";
            echo "Budget: " . $row['budget'] . "<br>";
        // Autres champs...
        }
        ?>
    </header>
</body>
</html>

=======
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>
</head>
<body>
    <header>
        <h1>Test</h1>
        <?php
        // Inclure le fichier contenant la fonction de connexion à la base de données
        include 'bdd.php';

        // Maintenant, vous pouvez utiliser la fonction getBD() pour obtenir une connexion à la base de données
        $bdd = getBD();

        // Vous pouvez ensuite exécuter vos requêtes SQL normalement en utilisant $bdd

        // Par exemple, récupérons les données d'une table nommée 'utilisateurs' :
        $query = $bdd->query("SELECT * FROM movie_data WHERE title = 'Star Wars';");

        // Vous pouvez maintenant parcourir les résultats comme d'habitude
        while ($row = $query->fetch()) {
            echo "Title: " . $row['title'] . "<br>";
            echo "Budget: " . $row['budget'] . "<br>";
        // Autres champs...
        }
        ?>
    </header>
</body>
</html>

>>>>>>> 1aa7653dafed4b152ab2a324315ef49f1effeba4
