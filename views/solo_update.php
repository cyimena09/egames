<?php
include("../models/read.php");
include("../templates/header.php");
include("../templates/navbar.php");
if(isset($_GET)) {
    $games = getGames();
    $player = getPlayerByIdAndGame($_GET['id']);
}
?>

<div style="margin-left: 40%">
    <form style="display: flex; flex-direction: column" id="formulaire-inside" action="../controllers/solo_update.php?playerId=<?php echo $player['id'] ?>" method="POST">

        <!--                CHOIX DE L'EQUIPE ET DU JEU-->
        <label for="firstName">Prénom</label>
        <input type="text" name="firstName" id="firstName" value="<?php echo $player['firstName']; ?>">

        <label for="lastName">Nom</label>
        <input type="text" name="lastName" id="lastName" value="<?php echo $player['lastName']; ?>">


        <label for="birthDate">Date de naissance</label>
        <input type="date" name="birthDate" id="birthDate" value="<?php echo $player['birthDate'];?>">

        <label for="email">E-mail</label>
        <input type="email" name="email" id="email" value="<?php echo $player['email'];?>" >

        <label for="pseudo">Pseudo</label>
        <input type="text" name="pseudo" id="pseudo" value="<?php echo $player['pseudo'];?>" >

        <label for="game">Jeu</label>
        <select style="width: 230px" name="game" id="game">
            <option value="<?php echo $player['gameId']; ?>" selected="selected">
                <?php echo $player['game']; ?>
            </option>

            <?php foreach ($games as $game){ ?>
                <?php if($player['game'] != $game['name']){ ?>
                    <option value="<?php echo $game['id']; ?>"><?php echo $game['name'];?></option>
                <?php } ?>
            <?php }?>
        </select>

        <p style="color: red"><?php if(isset($_GET['error'])) { echo $_GET['error']; } ?></p>
        <!--                FIN DE L'EQUIPE ET DU JEU-->

        <input type="submit" id="add" value="Enregistrer">
    </form>
</div>

<?php
include("../templates/footer.php");
?>
