<?php
include("../models/read.php");
include("../templates/header.php");
include("../templates/navbar.php");
if (isset($_GET['game_id'])) {
    $players = getPlayersByGameId($_GET['game_id']);
    $game = getGameById($_GET['game_id']);
    $gameName = $game['name'];
}
$i=0;
?>

<h2>Participant à <?php echo $gameName?></h2>

    <div style="margin-left: 25%">
        <table class="table table-dark col-8">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Prénom</th>
                <th scope="col">Nom</th>
                <th scope="col">Pseudo</th>
                <th scope="col">Age</th>
                <th scope="col">Équipe</th>
            </tr>
            </thead>
            <tbody>

            <?php foreach ($players as $player) { $i++ ?>
                <tr>
                    <th scope="row"><?php echo $i; ?></th>
                    <td><?php echo $player['firstName']; ?></td>
                    <td><?php echo $player['lastName']; ?></td>
                    <td><?php echo $player['pseudo']; ?></td>
                    <td><?php echo $player['age']; ?></td>
                    <td><?php echo $player['teamName']; ?></td>
                    <td><a class="btn btn-warning" href="player_update.php?previous_page=game_details&player_id=<?php echo $player['id']; ?>">Modifier</a>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
    <a style="margin-left: 25%" href="admin_space.php">Retour</a>

<?php
include("../templates/footer.php");
?>
