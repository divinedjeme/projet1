<?php
/* Verifiez si le paramettre id existe */
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    
    require_once "config.php";
    $link = se_connecter();
    /* Preparer la requete */
    $sql = "SELECT * FROM projet WHERE id = ?";
    
    if($stmt = mysqli_prepare($link, $sql)){
        
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        
        
        $param_id = trim($_GET["id"]);
        
        
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
    
            if(mysqli_num_rows($result) == 1){
                /* recuperer l'enregistrement */
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                
                /* recuperer les champs */
                $code = $row["code"];
                $nom = $row["nom"];
                $description = $row["description"];
                $budget = $row["budget"];
                $date_debut = $row["date_debut"];
                $date_fin = $row["date_fin"];
                $statut = $row["statut"];
            } else{
                /* Si pas de id correct retourne la page d'erreur */
                header("location: error.php");
                exit();
            }
            
        } else{
            echo "Oops! une erreur est survenue.";
        }
    }
     
    
    mysqli_stmt_close($stmt);
    
    
    mysqli_close($link);
} else{
    /* Si pas de id correct retourne la page d'erreur */
    header("location: error.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Voir l'enregistrement</title>
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
                    <h1 class="mt-5 mb-3">Voir l'enregistremnt</h1>
                    <div class="form-group">
                        <label>Code</label>
                        <p><b><?php echo $row["code"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Nom</label>
                        <p><b><?php echo $row["nom"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <p><b><?php echo $row["description"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Budget</label>
                        <p><b><?php echo $row["budget"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Date de debut</label>
                        <p><b><?php echo $row["date_debut"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Date de fin</label>
                        <p><b><?php echo $row["date_fin"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Statut</label>
                        <p><b><?php echo $row["statut"]; ?></b></p>
                    </div>
                    <p><a href="index.php" class="btn btn-primary">Retour</a></p>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>