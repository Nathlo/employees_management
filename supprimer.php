<?php
    // connexio à la base de donées
    include_once "connexion.php";
    // récuppération de l'id dans le lien
    $id = $_GET["id"];
    // requête de suppression
    $req = mysqli_query($con,"DELETE FROM employes WHERE id = $id");
    // redirection vers la page index
    header("Location:index.php");
?>