<?php
include("../models/read.php");
include("../templates/header.php");
include("../templates/navbar.php");
if(isset($_GET)){
    $games = getGames();
    $team = getTeamById($_GET['id']);
}
?>

<div style="margin-left: 40%">
    <form style="display: flex; flex-direction: column" id="formulaire-inside" action="../controllers/team_update.php?teamId=<?php echo $team['id'] ?>" method="POST">
        <!--                CHOIX DE L'EQUIPE ET DU JEU-->
            <label for="teamName">Nom de l'équipe</label>
            <input type="text" name="teamName" id="teamName" value="<?php echo $team['teamName']; ?>">

            <label for="game">Jeu</label>
            <select style="width: 230px" name="game" id="game">
                <?php foreach ($games as $game){ ?>
                    <option value="<?php echo $game['id']; ?>"><?php echo $game['name'];?></option>
                <?php }?>
            </select>

            <p style="color: red"><?php if(isset($_GET['error'])){echo $_GET['error'];} ?></p>
        <!--                FIN DE L'EQUIPE ET DU JEU-->
        <input type="submit" id="add" value="Enregistrer">
    </form>
</div>

<?php
include("../templates/footer.php");
?>
