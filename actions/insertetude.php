<?php

$etude = filter_input(INPUT_POST, "etude");

echo $etude;

include_once "../config.php";
$pdo = new PDO("mysql:host=" . config::SERVEUR . ";dbname=" . config::BDD, config::UTILISATEUR, config::MOTDEPASSE);

$requete = $pdo->prepare("insert into etude(nom) values(:etude)");
$requete->bindParam(':etude', $etude);
$requete->execute();

header("location: ../createetude.php");