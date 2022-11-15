<?php
if(isset($_POST['valider'])){
    include '../conf/db.php';
    $Nom = $_POST['Nom'];
    $prenom = $_POST['prenom'];
    $tel = $_POST['tel'];
    $Bp = $_POST['Bp'];
    $comptBank = $_POST['comptBank'];

    $r = "INSERT INTO fournisseur (Nom,prenom,tel,Bp,comptBank)
    values ('$Nom','$prenom','$tel','$Bp','$comptBank')";
    $connexion->exec($r);
    $location = $_SERVER['HTTP_REFERER'];
    if ($r) {
    $success = "fournisseur ajouté avec succès...";
    header('Location: ../pages/fournisseur.php?success=1');
    }
}
?>