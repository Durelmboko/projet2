<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>LIVREUR</title>
</head>

<body>
    <?php include '../inc/navbar.php' ?>

    <?php if (isset($_GET['delete']) && $_GET['delete'] == 1) { ?>
    <div class='alert alert-danger corner-radius container mt-4'>
        <p>livreur supprimé avec succés</p>
    </div>
    <?php unset($_GET['delete']);
    } ?>

    <?php if (isset($_GET['success']) && $_GET['success'] == 1) { ?>
    <div class='alert alert-success corner-radius container mt-4'>
        <p>livreur modifié avec succés</p>
    </div>
    <?php unset($_GET['success']);
    } ?>
    <div class="container mt-3">
        <div class="card">
            <div class="card-header bg-success text-white">
                LISTE DES LIVREURS
            </div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <th>Numliv</th> 
                        <th>id</th>
                        <th>codeA</th>
                        <th>dateliv</th>
                        <th>qteliv</th>
                        <th>prixliv</th>
                        <td>Action</td>
                    </tr>
                    <tr>
                        <?php
                        include '../conf/db.php';
                        $stmt = $connexion->query("SELECT * FROM livrer");

                        while ($row = $stmt->fetch()) { ?>

                    <tr>
                        <td><?php echo $row["Numliv"]; ?></td>
                        <td><?php echo $row["id"]; ?></td>
                        <td><?php echo $row["codeA"]; ?></td>
                        <td><?php echo $row["dateliv"]; ?></td>
                        <td><?php echo $row["qteliv"]; ?></td>
                        <td><?php echo $row["prixliv"]; ?></td>
                        <td><a class="btn btn-warning"
                                href="editelivrer.php?Numliv=<?php echo $row['Numliv']; ?>"> Modifier</a></td>      
                        <td><a class="btn btn-danger"
                                href="../traitements/deletelivrer.php?Numliv=<?php echo $row['Numliv']; ?>"
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

