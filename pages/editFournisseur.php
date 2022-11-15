<?php
    include '../conf/db.php';
        $q = $connexion->query("SELECT * FROM fournisseur WHERE id='" . $_GET["id"] . "'");
       
        while ($row = $q->fetch(PDO::FETCH_ASSOC)) {
            $Nom = $row['Nom'];
            $prenom = $row['prenom'];
            $tel = $row['tel'];
            $bp = $row['Bp'];
            $comptBank = $row['comptBank'];
            $idg = $row['idg'];

        }
    if (isset($_POST['update'])) {
        $nom = $_POST['Nom'];
        $prenom = $_POST['prenom'];
        $tel = $_POST['tel'];
        $bp = $_POST['Bp'];
        $comptBank = $_POST['comptBank'];
        $idg = $_POST['idg'];
        $r = "UPDATE fournisseur SET
        Nom='$Nom',prenom='$prenom',tel ='$tel',Bp = '$bp',comptBank= '$comptBank',idg = '$idg'
         WHERE id = '" . $_GET["id"] . "'";
        $connexion->exec($r);
        if ($r) {
            $success = "fournisseur modifié avec succès...";
            header('Location: Affichefournisseur.php?success=1');
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
                <form method = "POST" action = "">
                    <div class="mb-3">
                        <label for="" class="form-label">Nom:</label>
                        <input type="text" class="form-control" id="" name = "Nom" value = "<?php echo $Nom; ?>">
                    </div>
                    <div class="mb-3 ">
                        <label class="form-label" for="">prenom:</label>
                        <input type="text" class="form-control" id="" name = "prenom" value = "<?php echo $prenom; ?>">
                    </div>
                    <div class="mb-3 ">
                        <label class="form-label" for="">Tel:</label>
                        <input type="number" class="form-control" id="" name = "tel" value = "<?php echo $tel; ?>">
                    </div>
                    <div class="mb-3 ">
                        <label class="form-label" for="">BP:</label>
                        <input type="number" class="form-control" id="" name = "bp" value = "<?php echo $bp; ?>">
                    </div>
                    <div class="mb-3 ">
                        <label class="form-label" for="">comptBank:</label>
                        <input type="number" class="form-control" id="" name = "comptBank" value = "<?php echo $comptBank; ?>">
                    </div>
                    <div class="mb-3 ">
                        <label class="form-label" for="">idg:</label>
                        <select name="idg" id="" class="form-control" value = "<?php echo $idg; ?>">
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
                    <button type="submit" value = "enregistrer" class="btn btn-primary" name = "update">valider</button>
                </form>
            </div>
        </div>
    </div>    
</body>
</html>