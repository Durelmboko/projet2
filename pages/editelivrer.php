<?php
include '../conf/db.php';
        $q = $connexion->query("SELECT * FROM livrer WHERE Numliv='" . $_GET["Numliv"] . "'");

        while ($row = $q->fetch(PDO::FETCH_ASSOC)) {
    
        $id = $row['id'];
        $codeA = $row['codeA'];
        $dateliv = $row['dateliv'];
        $qteliv = $row['qteliv'];
        $prixliv = $row['prixliv'];
}

if (isset($_POST['update'])) {

        $id = $_POST['id'];
        $codeA = $_POST['codeA'];
        $dateliv = $_POST['dateliv'];
        $qteliv = $_POST['qteliv'];
        $prixliv = $_POST['prixliv'];

    $r = "UPDATE livrer SET id='$id',codeA='$codeA',dateliv='$dateliv',qteliv='$qteliv',prixliv='$prixliv' WHERE Numliv = '" . $_GET["Numliv"] . "'";
    $connexion->exec($r);

    if ($r) {
        $success = "livraison modifié avec succès...";
        header('Location:Affichelivrer.php?success=1');
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>LIVRER</title>
</head>

<body>
    <?php include '../inc/navbar.php' ?>

    <?php if (isset($_GET['success']) && $_GET['success'] == 1) { ?>
    <div class='alert alert-success corner-radius container'>
        <p>livraison ajouté avec succés</p>
    </div>
    <?php unset($_GET['success']);
    } ?>
    <div class="container mt-3">
        <div class="card">
            <div class="card-header bg-success text-white">
                GESTION DES LIVREURS
            </div>
            <div class="card-body">
                <form action="" method="post">
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
                        <input type="date" class="form-control" id="" name = "dateliv" value = "<?php echo $dateliv; ?>">
                    </div>
                    <div class="mb-3 ">
                        <label class="form-label" for="">quantite:</label>
                        <input type="number" class="form-control" id="" name = "qteliv" value = "<?php echo $qteliv; ?>">
                    </div>
                    <div class="mb-3 ">
                        <label class="form-label" for="">prix:</label>
                        <input type="number" class="form-control" id="" name = "prixliv" value = "<?php echo $prixliv; ?>">
                    </div>
                    <input type="submit" class="btn btn-primary" value="valider" name="update">
                </form>
            </div>
        </div>
    </div>

</body>

</html>
