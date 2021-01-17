<?php
$players = getPlayers();
$i=0;
?>

<h2>Tous les joueurs</h2>
<div style="margin-left: 25%">
    <table class="table table-dark col-8">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Prénom</th>
            <th scope="col">Nom</th>
            <th scope="col">Pseudo</th>
            <th scope="col">Age</th>
            <th scope="col">Email</th>
            <th scope="col">Équipe</th>
            <th scope="col">Jeu</th>
            <th scope="col">Action</th>
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
                <td><?php echo $player['email']; ?></td>
                <td><?php echo $player['teamName']; ?></td>
                <td><?php echo $player['gameName']; ?></td>
                <td><a class="btn btn-warning" href="player_update.php?previous_page=admin_space&player_id=<?php echo $player['id']; ?>">Modifier</a>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>