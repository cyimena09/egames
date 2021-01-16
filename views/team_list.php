<?php
$teams = getTeams();
$i=0;
?>

<h2>Liste des équipes</h2>
<div style="margin-left: 25%">
    <table class="table table-dark col-8">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nom de l'équipe</th>
            <th scope="col">Jeu</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>

        <?php foreach ($teams as $team) { $i++ ?>
            <tr>
                <th scope="row"><?php echo $i;?></th>
                <td><?php echo $team['teamName'];?></td>
                <td><?php echo $team['game'];?></td>
                <td><a class="btn btn-warning" href="team_details.php?id=<?php echo $team['id'];?>">Détails</a>
                    <a class="btn btn-danger" href="../controllers/team/team_delete.php?id=<?php echo $team['id'];?>">Supprimer</a>
                </td>
            </tr>
        <?php }?>
        </tbody>
    </table>
</div>