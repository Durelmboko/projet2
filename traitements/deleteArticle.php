<?php

include '../conf/connexion.php';

$r = "DELETE FROM filiere WHERE code = '" . $_GET["code"] . "'";
$connexion->query($r);
echo $r;
if ($r) {
    $location = $_SERVER['HTTP_REFERER'];
    header('Location: ../pages/listefiliere.php?delete=1');
}

