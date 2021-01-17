<?php
include("../models/read.php");
include("../templates/header.php");
include("../templates/navbar.php");
if(isset($_GET)){
    $games = getGames();
    $team = getTeamById($_GET['team_id']);
    $teamId = $_GET['team_id'];
}
?>

<div style="margin-left: 40%">
    <form style="display: flex; flex-direction: column" id="formulaire-inside" action="../controllers/team/team_update.php?team_id=<?php echo $team['id'] ?>" method="POST">
        <!--                CHOIX DE L'EQUIPE ET DU JEU-->
            <label for="teamName">Nom de l'équipe</label>
            <input type="text" name="teamName" id="teamName" value="<?php echo $team['teamName']; ?>">

            <label for="game">Jeu</label>
            <select style="width: 230px" name="game" id="game">
                <option value="<?php echo $team['gameId']; ?>" selected="selected">
                    <?php echo $team['game']; ?>
                </option>
                <?php foreach ($games as $game){ ?>
                <?php if ($team['gameId'] != $game['id']) { ?>
                    <option value="<?php echo $game['id']; ?>"><?php echo $game['name']; ?></option>
                    <?php } ?>
                <?php }?>
            </select>

            <p style="color: red"><?php if (isset($_GET['error'])) { echo $_GET['error']; } ?></p>
        <!--                FIN DE L'EQUIPE ET DU JEU-->
        <input type="submit" id="add" value="Enregistrer">
    </form>
    <a href="team_details.php?team_id=<?php echo $teamId; ?>">Retour</a>

</div>

<?php
include("../templates/footer.php");
?>
