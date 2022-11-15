<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>livrer</title>
</head>
<body>
<?php include('../inc/navbar.php') ;?>   
    <?php if (isset($_GET['success']) && $_GET['success'] == 1) { ?>
    <div class='alert alert-success corner-radius container mt-3'>
      <p>livraison ajouté avec succés</p>
    </div>
    <?php unset($_GET['success']);
    } ?>
    <div class="container mt-3">
        <div class="card">
            <div class="card-header bg-success text-white">
                GESTION LIVRAISON
            </div>
            <div class="conatainer mt-3">
      <div class="card-body">
                <form action="../traitements/livrer.php" method="post">
                    <div class="mb-3 ">
                        <label class="form-label" for="">id:</label>
                        <select name="id" id="" class="form-control">
                            <option value="">...</option>
                            <?php 
                                include '../conf/db.php';
                                $stmt = $connexion->query("SELECT* FROM fournisseur");
                                while ($value = $stmt->fetch()) { 
                            ?>
                            <option value="<?php echo $value['id']; ?>">
                            <?php echo $value['prenom'].' '.$value['Nom']; ?>
                            </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3 ">
                        <label class="form-label" for="">codeA:</label>
                        <select name="codeA" id="" class="form-control">
                            <option value="">...</option>
                            <?php 
                                include '../conf/db.php';
                                $stmt = $connexion->query("SELECT* FROM article");
                                while ($value = $stmt->fetch()) { 
                            ?>
                            <option value="<?php echo $value['codeA']; ?>">
                            <?php echo $value['Desig']; ?>
                             </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3 ">
                        <label class="form-label" for="">date livraison:</label>
                        <input type="date" class="form-control" id="" name = "dateliv">
                    </div>
                    <div class="mb-3 ">
                        <label class="form-label" for="">quantite:</label>
                        <input type="number" class="form-control" id="" name = "qteliv">
                    </div>
                    <div class="mb-3 ">
                        <label class="form-label" for="">prix:</label>
                        <input type="number" class="form-control" id="" name = "prixliv">
                    </div>
                    <div class="mb-3 ">
                        <button type="submit" class="btn btn-primary" name = "valider">valider</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>