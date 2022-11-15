<link rel="stylesheet" type="text/css" href="../public/style.css">
<?php
    include '../inc/navbar.php';
    echo "<br>";
    
    include '../conf/db.php';
    $selection = "SELECT * FROM article";
    $exec= $connexion->query($selection);             
    $donne = $exec->fetchAll(PDO::FETCH_ASSOC);
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

    <center>
        <h1>*les Article Enregistres*</h1>
        <br>
        <table class = "table" align = "center">
            <thead class = "table-light">
                <td align = "center" ><h3 > codeA</h3></td>
                <td align = "center" ><h3>designation</h3></td>
                <td align = "center" ><h3>pu</h3></td>
                <td align = "center" ><h3>Modifier</h3></td>
                <td align = "center" ><h3>supprimer</h3></td>
            </thead>
            <?php
                foreach ($donne as $value) {
            ?>
            <tr>
                <td align = "center" ><?php echo $value['codeA']; ?></td>
                <td align = "center" ><?php echo $value['Desig']; ?></td>
                <td align = "center" ><?php echo $value['Pu'];?></td>
                <td align = "center" ><a class="btn btn-info"href="editeArticle.php?codeA=<?php echo $value['codeA']; ?>">Modifier</a></td>
                <td align = "center" ><a class="btn btn-danger"href="../traitements/deleteArticle.php?codeA=<?php echo $value['codeA']; ?>
                "onclick="return confirm('Vous êtes sur le point de supprimer , vous voulez vraiment supprimer');"
                >Supprimer</a></td>
            </tr>
            <?php
                } 
            ?>
        </table>
    </center>
         