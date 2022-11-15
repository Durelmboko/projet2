<?php
if(isset($_POST['valider'])){
    include '../conf/db.php';
    $id = $_POST['id'];
    $codeA = $_POST['codeA'];
    $dateliv = $_POST['dateliv'];
    $qteliv = $_POST['qteliv'];
    $prixliv = $_POST['prixliv'];

    $r = "INSERT INTO livrer (Numliv,id,codeA,dateliv,qteliv,prixliv)
    values ('$Numliv','$id','$codeA','$dateliv','$qteliv','$prixliv')";
    $connexion->exec($r);
    $location = $_SERVER['HTTP_REFERER'];
    if ($r) {
    $success = "livraison ajouté avec succès...";
    header('Location: ../pages/livrer.php?success=1');
    }
}
?>