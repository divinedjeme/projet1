<?php
/* Inclure le fichier config */
include "config.php";
$link = se_connecter();
if(isset($_POST["enregistrer"])) {
    extract($_POST);
    $requete = "insert into projet(code, nom, description, budget, date_debut, date_fin, statut) values ('$code', '".$nom."', '".$description."', '$budget', '$date_debut', '$date_fin', '$statut');";
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
                    <h2 class="mt-5">Créer un enregistrement</h2>
                    <p>Remplir le formulaire pour enregistrer le projet dans la base de données</p>


                    <form action="create.php" method="POST">
                        <div class="form-group">
                            <label>Code</label>
                            <input type="text" name="code" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Nom</label>
                            <input type="text" name="nom" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Budget</label>
                            <input type="number" name="budget" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Date de debut</label>
                            <input type="date" name="date_debut" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Date de fin</label>
                            <input type="date" name="date_fin" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Statut</label>
                            <input type="radio" name="statut" value="true">
                            <label for="statut" value="true" >Achevé</label>
                            <input type="radio" name="statut" value="false">
                            <label for="statut" value="false" >Inachevé</label>
                        </div>
                        <div style="margin-top:20px;">
                            <input type="submit" class="btn btn-primary" name="enregistrer" value="Enregistrer">
                            <a href="index.php" class="btn btn-secondary ml-2">Annuler</a>
                        </div>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>