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
    $selection ="SELECT * FROM article";
    $exu
    ?>
    <?php if (isset($_GET['delete']) && $_GET['delete'] == 1) { ?>
    <div class='alert alert-danger corner-radius container mt-4'>
        <p>Adherant supprimé avec succés</p>
    </div>
    <?php unset($_GET['delete']);
    } ?>

    <?php if (isset($_GET['success']) && $_GET['success'] == 1) { ?>
    <div class='alert alert-success corner-radius container mt-4'>
        <p>Adherant modifié avec succés</p>
    </div>
    <?php unset($_GET['success']);
    } ?>


<?php
 include('../conf/db.php');

$selection = "SELECT * FROM  article";
$resultat=$connexion->query($selection);


include('../inc/navbar.php');



?>
<div class="container mt-3">
        <div class="card">
            <div class="card-header bg-success text-white">
                LISTE DES ARTICLES
            </div>
  <br/>
<div class="container">
<table class="table table-hover">
    <tr>
        <th>codeA</th>
        <th>Desig</th>
        <th>Pu</th>

    </tr>
    <tr>
        <?php
        while ($tbgroup=$resultat->fetch()) {?>
        <?php $taille=count($tbgroup);?>
            <tr>
                <td><?php echo $tbgroup['codeA'];?></td>
                <td><?php echo $tbgroup['Desig'];?></td>
                <td><?php echo $tbgroup['Pu'];?></td>


        <?php  } ?>
    </tr>
</table>
</div>