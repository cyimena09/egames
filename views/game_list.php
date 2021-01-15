<?php
$games = getGames();
$i=0;
?>

<h2>Liste des jeux</h2>
<div style="margin-left: 25%">
    <table class="table table-dark col-8">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nom du jeu</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>

        <?php foreach ($games as $game) { $i++ ?>
            <tr>
                <th scope="row"><?php echo $i;?></th>
                <td><?php echo $game['name'];?></td>
                <td><a class="btn btn-warning" href="game_details.php?id=<?php echo $game['id'];?>">Voir les participants</a>
                </td>
            </tr>
        <?php }?>
        </tbody>
    </table>
</div>