<?php
include("../models/read.php");
include("../templates/header.php");
include("../templates/navbar.php");
if(isset($_GET)){
    $player = getPlayer($_GET['id']);
    $teamId = $_GET['teamId'];
}
?>
<h2>Modifier un joueur</h2>
<div style="margin-left: 40%">
    <form style="display: flex; flex-direction: column" id="formulaire-inside" action="../controllers/team/player_team_update.php?teamId=<?php echo $player['FK_Team'] ?>&playerId=<?php echo $player['id'] ?>" method="POST">

        <label for="firstName">Prénom</label>
        <input type="text" name="firstName" id="firstName" value="<?php echo $player['firstName'];?>">

        <label for="lastName">Nom</label>
        <input type="text" name="lastName" id="lastName" value="<?php echo $player['lastName'];?>" >

        <label for="birthDate">Date de naissance</label>
        <input type="date" name="birthDate" id="birthDate" value="<?php echo $player['birthDate'];?>">

        <label for="email">E-mail</label>
        <input type="email" name="email" id="email" value="<?php echo $player['email'];?>" >

        <label for="pseudo">Pseudo</label>
        <input type="text" name="pseudo" id="pseudo" value="<?php echo $player['pseudo'];?>" >

        <p style="color: red"><?php if(isset($_GET['error'])){echo $_GET['error'];} ?></p>

        <input type="submit" id="add" value="Enregistrer">
    </form>
    <a href="team_details.php?id=<?php echo $teamId?>">Retour</a>
</div>

<?php
include("../templates/footer.php");
?>

