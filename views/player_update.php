<?php
include("../models/read.php");
include("../templates/header.php");
include("../templates/navbar.php");
$teamId = null; // On le déclare null car cette variable n'est pas toujours défini
if (isset($_GET['player_id'])) {
    $games = getGames();
    $player = getPlayerByIdAndGame($_GET['player_id']);
}
if (isset($_GET['previous_page'])) {
    $previousPage = $_GET['previous_page'];
}
if (isset($_GET['team_id'])) {
    $teamId = $_GET['team_id'];
}
?>

    <h2>Modifier un joueur</h2>
    <div style="margin-left: 40%">
        <form style="display: flex; flex-direction: column" id="formulaire-inside"
              action="../controllers/player/player_update.php?previous_page=<?php echo $previousPage?>&team_id=<?php echo $teamId; ?>&game_id=<?php echo $player['gameId']; ?>&player_id=<?php echo $player['playerId']; ?>"
              method="POST">
            <!--                CHOIX DE L'EQUIPE ET DU JEU-->
            <label for="firstName">Prénom</label>
            <input type="text" name="firstName" id="firstName" value="<?php echo $player['firstName']; ?>">

            <label for="lastName">Nom</label>
            <input type="text" name="lastName" id="lastName" value="<?php echo $player['lastName']; ?>">


            <label for="birthDate">Date de naissance</label>
            <input type="date" name="birthDate" id="birthDate" value="<?php echo $player['birthDate']; ?>">

            <label for="email">E-mail</label>
            <input type="email" name="email" id="email" value="<?php echo $player['email']; ?>" >

            <label for="pseudo">Pseudo</label>
            <input type="text" name="pseudo" id="pseudo" value="<?php echo $player['pseudo']; ?>" >

            <?php if ($player['teamId'] == null) { ?>
                <label for="gameId">Jeu</label>
                <select style="width: 230px" name="gameId" id="gameId">
                    <option value="<?php echo $player['gameId']; ?>" selected="selected">
                        <?php echo $player['game']; ?>
                    </option>

                    <?php foreach ($games as $game) { ?>
                        <?php if ($player['game'] != $game['name']) { ?>
                            <option value="<?php echo $game['id']; ?>"><?php echo $game['name']; ?></option>
                        <?php } ?>
                    <?php }?>
                </select>
            <?php }?>
            <p style="color: red"><?php if (isset($_GET['error'])) { echo $_GET['error']; } ?></p>
            <!--                FIN DE L'EQUIPE ET DU JEU-->

            <input type="submit" id="add" value="Enregistrer">
        </form>

        <a href="<?php echo $previousPage?>.php?team_id=<?php echo $teamId; ?>&game_id=<?php echo $player['gameId']; ?>">Retour</a>
    </div>

<?php
include("../templates/footer.php");
?>