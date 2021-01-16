<?php
$players = getPlayersWithoutTeam();
$i=0;
?>

<h2>Liste des joueurs solitaire</h2>
<div style="margin-left: 25%">
    <table class="table table-dark col-8">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Prénom</th>
            <th scope="col">Nom</th>
            <th scope="col">Pseudo</th>
            <th scope="col">Jeu</th>
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
                <td><?php echo $player['game'];?></td>
                <td><a class="btn btn-warning" href="solo_update.php?id=<?php echo $player['id'];?>">Modifier</a>
                    <a class="btn btn-danger" href="../controllers/solo/solo_delete.php?id=<?php echo $player['id'];?>">Supprimer</a>
                </td>
            </tr>
        <?php }?>
        </tbody>
    </table>
</div>
