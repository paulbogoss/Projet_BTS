<?php

$title="Nouvelle plage";
include("header.php");

include_once "config.php";
$pdo = new PDO("mysql:host=" . config::SERVEUR . ";dbname=" . config::BDD, config::UTILISATEUR, config::MOTDEPASSE);

$requete = $pdo->prepare("select * from plage");
$requete->execute();
$lignes = $requete->fetchAll();

?>


    <div class="container">
        <h2>Créer une plage</h2>
        <form action="actions/insertplaya.php" method="post">
            <div class="form-group">
                <label for="nom">Nom de la plage</label>
                <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom de la plage">
            </div>
            <div class="form-group">
                <label for="commune">Nom de la commune</label>
                <input type="text" class="form-control" id="commune" name="commune" placeholder="Nom de la commune">
            </div>
            <div class="form-group">
                <label for="departement">Nom du département</label>
                <input type="text" class="form-control" id="departement" name="departement"
                       placeholder="Nom du département">
            </div>
            <div class="form-group">
                <label for="superficie">Superficie en m²</label>
                <input type="number" class="form-control" id="superficie" name="superficie" placeholder="Superficie">
            </div>
            <br>
            <button type="submit" class="btn btn-success">OK</button>
        </form>
    </div>
    <hr>

    <div class="container">
        <h2>Liste des plages</h2>
        <table>
            <tr>
                <th>
                    Plage
                </th>
                <th>Commune</th>
                <th>Département</th>
                <th>Superficie</th>
                <th></th>
            </tr>
            <?php foreach ($lignes as $l) { ?>
                <tr>
                    <td><?php echo $l['nom'] ?></td>
                    <td><?php echo $l['commune'] ?></td>
                    <td><?php echo $l['departement'] ?></td>
                    <td><?php echo $l['superficie'] ?>m²</td>
                    <td>
                    <td><a href="actions/deleteplaya.php?id=<?php echo $l['id'] ?>"
                           class="btn btn-success">Supprimer</a></td>

                    </form>

                </tr>
            <?php } ?>
        </table>
    </div>
<?php
include("footer.php");
