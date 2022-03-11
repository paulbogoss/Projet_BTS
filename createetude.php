<?php

include("header.php");

include_once "config.php";
$pdo = new PDO("mysql:host=" . config::SERVEUR . ";dbname=" . config::BDD, config::UTILISATEUR, config::MOTDEPASSE);

$requete = $pdo->prepare("select * from plage");
$requete->execute();
$lignes = $requete->fetchAll();

$requete = $pdo->prepare("select * from etude");
$requete->execute();
$etude = $requete->fetchAll();
?>
<div class="container">
    <h1>Créer une étude</h1>
    <form action="actions/insertetude.php" method="post">
        <div class="form-group">
            <label for="nom">Nom de l'étude</label>
            <input type="text" class="form-control" id="etude" name="etude" placeholder="Nom d'étude">
            <br>

        </div>
        <div>
            <?php foreach ($lignes as $l) { ?>
                <input type="checkbox" value="<?php echo $l["id"] ?>" name="id[]">
                <label for="<?php echo $l['id'] ?>"><?php echo $l['nom'] ?></label>
            <?php } ?>
        </div>
        <div>
            <br>
            <button type="submit" class="btn btn-success">Valideeeyyyyy</button>
        </div>
</div>

<div class="container">
    <hr>
    <h2>Liste des études</h2>
    <table>
        <tr>
            <th>
                Etudes
            </th>
            <th></th>
        </tr>
        <tr>
        <?php foreach ($etude as $e) { ?>

            <td><?php echo $e['nom'] ?>  </td>


            <td><a href="actions/deleteetude.php?id=<?php echo $e['id'] ?>"
                   class="btn btn-success">Supprimer</a></td>
            </form>
        </tr>

        <?php } ?>
    </table>
</div>

