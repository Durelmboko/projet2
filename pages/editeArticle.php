<?php
include '../conf/db.php';
$q = $connexion->query("SELECT * FROM article WHERE codeA='" . $_GET["codeA"] . "'");
while ($row = $q->fetch(PDO::FETCH_ASSOC)) {
    $Desig= $row['Desig'];
    $Pu = $row['Pu'];
}

if (isset($_POST['update'])) {

    $Desig = $_POST['Desig'];
    $Pu = $_POST['Pu'];


    $r = "UPDATE article SET Desig='$Desig',Pu='$Pu' WHERE codeA = '" . $_GET["codeA"] . "'";
    $connexion->exec($r);

    if ($r) {
        $success = "article modifié avec succès...";
        header('Location:liste.php?success=1');
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../public/style.css">

    <title>Article</title>
</head>

<body>
    <?php include '../inc/navbar.php' ?>

    <?php if (isset($_GET['success']) && $_GET['success'] == 1) { ?>
    <div class='alert alert-success corner-radius container'>
        <p>Article ajouté avec succés</p>
    </div>
    <?php unset($_GET['success']);
    } ?>
    <div class="container mt-3">
        <div class="card">
            <div class="card-header bg-success text-white">
                Gestion ARTICLE
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="mb-3">
                   <label for="DesignationA" class="form-label">DesignationA</label>
            <input type="text" name="Desig" class="form-control" value="<?php echo $Desig; ?>">
            </div>
            <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Pu</label>
            <input type="number" name="Pu" class="form-control" value="<?php echo $Pu; ?>">
            </div>
            <br>
                    </div>
                    <input type="submit" class="btn btn-primary" value="Enregistrer" name="update">
                </form>
            </div>
        </div>
    </div>

</body>

</html>
