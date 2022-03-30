<?php

$etude = filter_input(INPUT_POST, "etude");
$plage = $_POST["id"];
echo $etude;
var_dump($plage);

include_once "../config.php";
$pdo = new PDO("mysql:host=" . config::SERVEUR . ";dbname=" . config::BDD, config::UTILISATEUR, config::MOTDEPASSE);

$requete = $pdo->prepare("insert into etude(nom) values(:etude)");
$requete->bindParam(':etude', $etude);
$requete->execute();

$id_etude = $pdo->lastInsertId();
foreach ($plage as $p) {
    $requete = $pdo->prepare("insert into liaison(etude_id,plage_id) values(:etudeid,:plageid)");
    $requete->bindParam(':etudeid', $id_etude);
    $requete->bindParam(':plageid', $p);
    $requete->execute();
    echo $p.">";
    echo $id_etude."<br>";
}
header("location: ../createetude.php");