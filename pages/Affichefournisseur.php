<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>FOURNISSEUR</title>
</head>

<body>
    <?php include '../inc/navbar.php' ?>

    <?php if (isset($_GET['delete']) && $_GET['delete'] == 1) { ?>
    <div class='alert alert-danger corner-radius container mt-4'>
        <p>fournisseur supprimé avec succés</p>
    </div>
    <?php unset($_GET['delete']);
    } ?>

    <?php if (isset($_GET['success']) && $_GET['success'] == 1) { ?>
    <div class='alert alert-success corner-radius container mt-4'>
        <p>fournisseur modifié avec succés</p>
    </div>
    <?php unset($_GET['success']);
    } ?>
    <div class="container mt-3">
        <div class="card">
            <div class="card-header bg-success text-white">
                LISTE DES FOURNISSEUR
            </div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <th>id</th> 
                        <th>Nom</th>
                        <th>prenom</th>
                        <th>tel</th>
                        <th>Bp</th>
                        <th>comptBank</th>
                        <td>Action</td>
                    </tr>
                    <tr>
                        <?php
                        include '../conf/db.php';
                        $stmt = $connexion->query("SELECT * FROM fournisseur");

                        while ($row = $stmt->fetch()) { ?>

                    <tr>
                        <td><?php echo $row["id"]; ?></td>
                        <td><?php echo $row["Nom"]; ?></td>
                        <td><?php echo $row["prenom"]; ?></td>
                        <td><?php echo $row["tel"]; ?></td>
                        <td><?php echo $row["Bp"]; ?></td>
                        <td><?php echo $row["comptBank"]; ?></td>
                        <td><a class="btn btn-warning"
                                href="editFournisseur.php?id=<?php echo $row['id']; ?>"> Modifier</a></td>      
                        <td><a class="btn btn-danger"
                                href="../traitements/deletefournisseur.php?id=<?php echo $row['id']; ?>"
                                onclick="return confirm('Vous êtes sur le point de supprimer , vous voulez vraiment supprimer');">Supprimer</a>
                        </td>

                    </tr>

                    <?php
                        }

                ?>
                    </tr>
                </table>
            </div>
        </div>
    </div>

</body>

</html>

