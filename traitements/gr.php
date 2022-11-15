<?php
if(isset($_POST['valider'])){
    include '../conf/db.php';
    $Nomg = $_POST['Nomg'];
    
    $r = "INSERT INTO groupement (Nomg)
    values ('$Nomg')";
    $connexion->exec($r);
    $location = $_SERVER['HTTP_REFERER'];
    if ($r) {
    $success = "groupement ajouté avec succès...";
    header('Location: ../pages/groupement.php?success=1');
    }
}
?>