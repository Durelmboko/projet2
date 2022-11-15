<?php

include '../conf/db.php';

$r = "DELETE FROM livrer WHERE Numliv = '" . $_GET["Numliv"] . "'";
$connexion->query($r);
echo $r;
if ($r) {
    $location = $_SERVER['HTTP_REFERER'];
    header('Location: ../pages/Affichelivrer.php?delete=1');
}

