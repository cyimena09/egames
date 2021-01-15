<?php
include("../models/read.php");
include("../templates/header.php");
include("../templates/navbar.php");
if (isset($_GET['id'])) {
    $players = getPlayersByTeamId($_GET['id']);
    $team = getTeamById($_GET['id']);
}
$i=0;
?>

<h2>Equipe : " <?php echo $team['teamName']; ?> "</h2>
<h2>Jeu : " <?php echo $team['game']; ?> "</h2>

<a style="margin-left: 25%" href="../views/team_update.php?id=<?php echo $team['id'];?>">Modifier le nom de l'équipe ou le jeu</a>
<div style="margin-left: 25%">
    <table class="table table-dark col-8">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Prénom</th>
            <th scope="col">Nom</th>
            <th scope="col">Pseudo</th>
            <th scope="col">Date de naissance</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>

    <?php foreach ($players as $player){ $i++ ?>
        <tr>
            <th scope="row"><?php echo $i;?></th>
            <td><?php echo $player['firstName'];?></td>
            <td><?php echo $player['lastName'];?></td>
            <td><?php echo $player['pseudo'];?></td>
            <td><?php echo $player['birthDate'];?></td>
            <td><a class="btn btn-warning" href="../views/player_update.php?id=<?php echo $player['id'];?>">Modifier</a>
            </td>
        </tr>
    <?php }?>
        </tbody>
    </table>
</div>
    <a style="margin-left: 25%" href="../views/admin_space.php">Retour</a>

<?php include("../templates/footer.php");
