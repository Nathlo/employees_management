<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php 
        // vérifier que le button "Ajouter" a été bien cliqué
        if (isset($_POST["button"])) {
            // extraction des infos envoyées dans des variables par la méthode POST
            extract($_POST);
            // vérifier que tous les champs sont remplis
            if(isset($nom) && isset($prenom) && $age) {
                // connexion à la base
                include_once "connexion.php";
                // requête d'ajout
                $req = mysqli_query($con, "INSERT INTO employes VALUES(NULL, '$nom', '$prenom', '$age')");
                if ($req) {// si la requête a été un succès, on fait une redirection
                    header("location: index.php");
                } else {// si non
                    $message = "Employé non ajouté";
                }
            } else {
                // si non,
                $message = "Veuillez remplir tous les champs.";
            }
        }
    
    ?>
    <div class="form">
        <a href="index.php" class="back_btn"><img src="images/back.png">Retour</a>
        <h2>Ajouter un employé</h2>
        <p class="erreur_message">
            <?php 
                // si la variable message existe, affichez son contenu.
                if (isset($message)) {
                    echo $message;
                }
            ?>
        </p>
        <form action="" method="POST">
            <label>Nom</label>
            <input type="text" name="nom">
            <label>Prénom</label>
            <input type="text" name="prenom">
            <label>Âge</label>
            <input type="number" name="age">
            <input type="submit" value="Ajouter" name="button">      
        </form>

    </div>
</body>
</html>