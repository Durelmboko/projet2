<?php
if(isset($_POST['valider'])){
    include '../conf/db.php';
    $Nom = $_POST['Nom'];
    $prenom = $_POST['prenom'];
    $sexe = $_POST['sexe'];
    $tel = $_POST['tel'];
    $email = $_POST['email'];

    $r = "INSERT INTO utilisateur (Nom,prenom,sexe,tel,email)
    values ('$Nom','$prenom','$sexe','$tel','$email')";
    $connexion->exec($r);
    $location = $_SERVER['HTTP_REFERER'];
    if ($r) {
    $success = "fournisseur ajouté avec succès...";
    header('Location: ../pages/?success=1');
    }
}
?>