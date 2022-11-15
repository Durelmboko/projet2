<?php
if(isset($_POST['valider'])){
    include '../conf/db.php';
    $login = $_POST['login'];
    $pass = $_POST['pass'];
    

    $r = "INSERT INTO utilisateur (login,pass)
    values ('$login','$pass')";
    $connexion->exec($r);
    $location = $_SERVER['HTTP_REFERER'];
    if ($r) {
    $success = "Article ajouté avec succès...";
    header('Location: ../pages/?success=1');
    }
}
?>