<?php

include '../conf/db.php';

$r = "DELETE FROM groupement WHERE idg = '" . $_GET["idg"] . "'";
$connexion->query($r);
echo $r;
if ($r) {
    $location = $_SERVER['HTTP_REFERER'];
    header('Location: ../pages/Affichegroupement.php?delete=1');
}

