<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>GROUPEMENT</title>
</head>

<body>
    <?php include '../inc/navbar.php' ?>

    <?php if (isset($_GET['delete']) && $_GET['delete'] == 1) { ?>
    <div class='alert alert-danger corner-radius container mt-4'>
        <p>groupement supprimé avec succés</p>
    </div>
    <?php unset($_GET['delete']);
    } ?>

    <?php if (isset($_GET['success']) && $_GET['success'] == 1) { ?>
    <div class='alert alert-success corner-radius container mt-4'>
        <p>groupement modifié avec succés</p>
    </div>
    <?php unset($_GET['success']);
    } ?>
    <div class="container mt-3">
        <div class="card">
            <div class="card-header bg-success text-white">
            LISTE GROUPEMENT
            </div>
            <div class="card-body">
                <table class="table">
                    <tr>
                    <th>idg</th>
                    <th>Nomg</th>
                    <td>Action</td>
                    </tr>
                    <tr>
                        <?php
                        include '../conf/db.php';
                        $q = $connexion->query("SELECT * FROM groupement");

                        while ($row = $q->fetch()) { ?> 
              
                    <tr>
                    <td><?php echo $row["idg"]; ?></td>
                    <td><?php echo $row['Nomg'];?></td>
                        <td><a class="btn btn-warning"
                                href="editegroupement.php?idg=<?php echo $row['idg']; ?>"> Modifier</a></td>
                        <td><a class="btn btn-danger"
                                href="../traitements/deletegroupement.php?idg=<?php echo $row['idg']; ?>"
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
