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
         
        // connexion à la base
        include_once "connexion.php";
        // on récupère le id dans le lien
        $id = $_GET['id'];
        // requête pour afficher les infos d'un employé
        $req = mysqli_query($con, "SELECT * FROM employes WHERE id = $id");
        $row = mysqli_fetch_assoc($req);

        // vérifier que le button "Ajouter" a été bien cliqué
        if (isset($_POST["button"])) {
            // extraction des infos envoyées dans des variables par la méthode POST
            extract($_POST);
            // vérifier que tous les champs sont remplis
            if(isset($nom) && isset($prenom) && $age) {
               // requête de modification
               $req = mysqli_query($con, "UPDATE employes SET nom = '$nom', prenom = '$prenom', age = '$age' WHERE id = $id");
                if ($req) {// si la requête a été un succès, on fait une redirection
                    header("location: index.php");
                } else {// si non
                    $message = "Employé non modifié";
                }
            } else {
                // si non,
                $message = "Veuillez remplir tous les champs.";
            }
        }
    
    ?>

    <div class="form">
        <a href="index.php" class="back_btn"><img src="images/back.png">Retour</a>
        <h2>Modifier l'employé : <?=$row['nom']?></h2>
        <p class="erreur_message">
            <?php 
                if(isset($message)) {
                    echo $message;
                }
            ?>
        </p>
        <form action="" method="POST">
            <label>Nom</label>
            <input type="text" name="nom" value="<?=$row['nom']?>">
            <label>Prénom</label>
            <input type="text" name="prenom" value="<?=$row['prenom']?>">
            <label>Âge</label>
            <input type="number" name="age" value="<?=$row['age']?>">
            <input type="submit" value="Modifier" name="button">      
        </form>

    </div>
</body>
</html>