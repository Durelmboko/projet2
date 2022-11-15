<?php

include '../conf/db.php';

$r = "DELETE FROM fournisseur WHERE id = '" . $_GET["id"] . "'";
$connexion->query($r);
echo $r;
if ($r) {
    $location = $_SERVER['HTTP_REFERER'];
    header('Location: ../pages/Affichefournisseur.php?delete=1');
}

