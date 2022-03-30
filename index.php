<?php
$title="Accueil";
include("header.php");

include_once "config.php";
$pdo = new PDO("mysql:host=" . config::SERVEUR . ";dbname=" . config::BDD, config::UTILISATEUR, config::MOTDEPASSE);

$requete = $pdo->prepare("select * from plage");
$requete->execute();
$lignes = $requete->fetchAll();
?>


<?php
include("footer.php");
