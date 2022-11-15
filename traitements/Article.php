<?php
if(isset($_POST['valider'])){
    include '../conf/db.php';
    $Desig = $_POST['Desig'];
    $Pu = $_POST['Pu'];
    

    $r = "INSERT INTO article (Desig,Pu)
    values ('$Desig','$Pu')";
    $connexion->exec($r);
    $location = $_SERVER['HTTP_REFERER'];
    if ($r) {
    $success = "Article ajouté avec succès...";
    header('Location: ../pages/article.php?success=1');
    }
}
?>