<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>adherant</title>
    <link rel="stylesheet" type="text/css" href="../public/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../public/css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  </head>
  <body>
    <?php include('../inc/navbar.php') ;?>   
    <?php if (isset($_GET['success']) && $_GET['success'] == 1) { ?>
    <div class='alert alert-success corner-radius container mt-3'>
      <p>fournisseur ajouté avec succés</p>
    </div>
    <?php unset($_GET['success']);
    } ?>
    <div class="container mt-3">
        <div class="card">
            <div class="card-header bg-success text-white">
                GESTION FOURNISSEUR
            </div>
            <div class="conatainer mt-3">
      <div class="card-body">
      <form method = "POST" action = "../traitements/fsseur.php">
                    <div class="mb-3">
                        <label for="" class="form-label">Nom:</label>
                        <input type="text" class="form-control" id="" name = "Nom">
                    </div>
                    <div class="mb-3 ">
                        <label class="form-label" for="">prenom:</label>
                        <input type="text" class="form-control" id="" name = "prenom">
                    </div>
                    <div class="mb-3 ">
                        <label class="form-label" for="">tel:</label>
                        <input type="number" class="form-control" id="" name = "tel">
                    </div>
                    <div class="mb-3 ">
                        <label class="form-label" for="">BP:</label>
                        <input type="number" class="form-control" id="" name = "Bp">
                    </div>
                    <div class="mb-3 ">
                        <label class="form-label" for="">comptBank:</label>
                        <input type="number" class="form-control" id="" name = "comptBank">
                    </div>
                    <div class="mb-3 ">
                        <label class="form-label" for="">idg:</label>
                        <select name="idg" id="" class="form-control">
                            <?php 
                                include '../conf/db.php';
                                $stmt = $connexion->query("SELECT* FROM groupement");
                                while ($value = $stmt->fetch()) { 
                            ?>
                            <option value="<?php echo $value['idg']; ?>">
                            <?php echo $value['Nomg']; ?>
                            </option>
                            <?php } ?>
                        </select>
                    </div>
          
          <button type="submit" name="valider" id="bouton" class="btn btn-primary">Enregistrer</button>
        </form>
      </div>

    </div>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  </body>
</html>