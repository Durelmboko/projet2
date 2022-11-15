<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Adherant</title>
</head>

<body>
    <?php include '../inc/navbar.php' 
    
    ?>
    <?php if (isset($_GET['delete']) && $_GET['delete'] == 1) { ?>
    <div class='alert alert-danger corner-radius container mt-4'>
        <p>Article supprimé avec succés</p>
    </div>
    <?php unset($_GET['delete']);
    } ?>

    <?php if (isset($_GET['success']) && $_GET['success'] == 1) { ?>
    <div class='alert alert-success corner-radius container mt-4'>
        <p>Article modifié avec succés</p>
    </div>
    <?php unset($_GET['success']);
    } ?>
    <div class="container mt-3">
        <div class="card">
            <div class="card-header bg-success text-white">
            LISTE ARTICLE
            </div>
            <div class="card-body">
                <table class="table">
                    <tr>
                    <th>codeA</th>
                    <th>Desig</th>
                     <th>Pu</th>
                    <td>Action</td>
                    </tr>
                    <tr>
                        <?php
                        include '../conf/db.php';
                        $stmt = $connexion->query("SELECT * FROM article");

                        while ($row = $stmt->fetch()) { ?> 
                        <?php $taille=count($row);?>  
                    <tr>
                    <td><?php echo $row['codeA'];?></td>
                    <td><?php echo $row['Desig'];?></td>
                    <td><?php echo $row['Pu'];?></td>
                        <td><a class="btn btn-warning"
                                href="editeArticle.php?codeA=<?php echo $row['codeA']; ?>"> Modifier</a></td>
                        <td><a class="btn btn-danger"
                                href="../traitements/deleteArticle.php?codeA=<?php echo $row['codeA']; ?>"
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
