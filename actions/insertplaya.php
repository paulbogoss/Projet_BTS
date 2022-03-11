<?php

$nom = filter_input(INPUT_POST, "nom");
$commune = filter_input(INPUT_POST, "commune");
$departement = filter_input(INPUT_POST, "departement");
$superficie = filter_input(INPUT_POST, "superficie");

echo $nom;
echo "<br>";
echo $commune;
echo "<br>";
echo $departement;
echo "<br>";
echo $superficie;

include_once "../config.php";
$pdo = new PDO("mysql:host=" . config::SERVEUR . ";dbname=" . config::BDD, config::UTILISATEUR, config::MOTDEPASSE);

$requete = $pdo->prepare("insert into plage(nom,commune,departement,superficie) values(:nom,:commune,:departement,:superficie)");
$requete->bindParam(':nom', $nom);
$requete->bindParam(':commune', $commune);
$requete->bindParam(':departement', $departement);
$requete->bindParam(':superficie', $superficie);
$requete->execute();

header("location: ../createplage.php");