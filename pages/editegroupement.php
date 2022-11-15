<?php
include '../conf/db.php';
$q = $connexion->query("SELECT * FROM groupement WHERE idg='" . $_GET["idg"] . "'");
while ($row = $q->fetch(PDO::FETCH_ASSOC)) {
    $Nomg = $row['Nomg'];
}

if (isset($_POST['update'])) {
    $Nomg = $_POST['Nomg'];

    $r = "UPDATE groupement SET Nomg='$Nomg' WHERE idg = '" . $_GET["idg"] . "'";
    $connexion->exec($r);

    if ($r) {
        $success = "groupement modifié avec succès...";
        header('Location:Affichegroupement.php?success=1');
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>groupement</title>
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
                Gestion GROUPEMENT
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Nomg</label>
            <input type="text" name="Nomg" class="form-control" value="<?php echo $Nomg; ?>">
            </div>
            <br>
                    <input type="submit" class="btn btn-primary" value="Enregistrer" name="update">
                </form>
            </div>
        </div>
    </div>
</body>

</html>
