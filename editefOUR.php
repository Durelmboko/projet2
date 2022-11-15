<?php
include '../conf/db.php';
$q = $connexion->query("SELECT * FROM fournisseur WHERE id='" . $_GET["id"] . "'");

while ($row = $q->fetch(PDO::FETCH_ASSOC)) {
    $Nom = $_POST['Nom'];
    $prenom = $_POST['prenom'];
    $Tel = $_POST['Tel'];
    $Bp = $_POST['Bp'];
    $comptBank = $_POST['compt'];
}

if (isset($_POST['update'])) {

    $Nom = $_POST['Nom'];
    $prenom = $_POST['prenom'];
    $Tel = $_POST['Tel'];
    $Bp = $_POST['Bp'];
    $comptBank = $_POST['compt'];



    $r = "UPDATE fournisseur SET Nom='$Nom',prenom='$prenom',tel='$Tel',Bp='$Bp',comptBank='$compt' WHERE id = '" . $_GET["id"] . "'";
    $connexion->exec($r);

    if ($r) {
        $success = "fournisseur modifié avec succès...";
        header('Location:Affichefournisseur.php?success=1');
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>fournisseur</title>
</head>

<body>
    <?php include '../inc/navbar.php' ?>

    <?php if (isset($_GET['success']) && $_GET['success'] == 1) { ?>
    <div class='alert alert-success corner-radius container'>
        <p>groupement ajouté avec succés</p>
    </div>
    <?php unset($_GET['success']);
    } ?>
    <div class="container mt-3">
        <div class="card">
            <div class="card-header bg-success text-white">
                GESTION DES FOURNISSEUR
            </div>
            <div class="card-body">
            <form method = "POST" action = "../traitements/fsseur.php" >
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Nom</label>
            <input type="number" name="Nom" class="form-control" value="<?php echo $Nom; ?>">
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">prenom</label>
            <input type="number" name="prenom" class="form-control"value="<?php echo $prenom; ?>">
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">tel</label>
            <input type="number" name="Tel" class="form-control" value="<?php echo $tel; ?>">
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Bp</label>
            <input type="number" name="Bp" class="form-control" value="<?php echo $Bp; ?>">
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">comptBank</label>
            <input type="number" name="compt" class="form-control" value="<?php echo $comptBank; ?>">
          </div>
          </div>
                    <input type="submit" class="btn btn-primary" value="Enregistrer" name="update">
                </form>
            </div>
        </div>
    </div>

</body>

</html>
