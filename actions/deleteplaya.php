<?php

$id = filter_input(INPUT_GET,"id");

include_once "../config.php";
$pdo = new PDO("mysql:host=".config::SERVEUR.";dbname=".config::BDD, config::UTILISATEUR,config::MOTDEPASSE);

$requete = $pdo->prepare("delete from plage where id=:id");
$requete->bindParam(':id',$id);
$requete->execute();

header("location: ../createplage.php");