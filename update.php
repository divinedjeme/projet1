<?php
/* Inclure le fichier config */
include "config.php";
$link = se_connecter();
if(isset($_POST["modifier"])) {
    extract($_POST);
    $requete = "update projet set code='$new_code', nom='$new_nom', description='$new_description', budget='$new_budget', date_debut='$new_date_debut', date_fin='$new_date_fin', statut='$new_statut' where id='$id'";
    $exec = mysqli_query($link, $requete) or die(mysqli_error($link));
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        .wrapper{
            width: 700px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Mise à jour de l'enregistrement</h2>
                    <p>Modifier les champs et enregistrer</p>


                    <form action="create.php" method="POST">
                        <div class="form-group">
                            <label>Code</label>
                            <input type="text" name="new_code" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Nom</label>
                            <input type="text" name="new_nom" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="new_description" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Budget</label>
                            <input type="number" name="new_budget" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Date de debut</label>
                            <input type="date" name="new_date_debut" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Date de fin</label>
                            <input type="date" name="new_date_fin" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Statut</label>
                            <input type="radio" name="new_statut" value="true">
                            <label for="statut" value="true" >Achevé</label>
                            <input type="radio" name="statut" value="false">
                            <label for="statut" value="false">Inachevé</label>
                        </div>
                        <div style="margin-top:20px;">
                            <input type="submit" class="btn btn-primary" name="modifier" value="Modifier">
                            <a href="index.php" class="btn btn-secondary ml-2">Annuler</a>
                        </div>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>