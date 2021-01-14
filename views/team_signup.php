<?php
session_start();
include("../templates/header.php");
include("../templates/navbar.php");
include("../models/read.php");
include ("../configuration.php");
$games = getGames();
$previousPlayer = null;

if (isset($_GET['player'])){
    $player = $_GET['player'];
} else {
    $player = 0;
}

if (isset($_GET['nextable'])){
    $nextable = false;
} else {
    $nextable = true;
}

if(isset($_GET['player'])) {
    $previousPlayer = $_GET['player'];
}

if(isset($_SESSION['players'])){
    $nbRegisteredPlayer = count($_SESSION['players']);
} else {
    $nbRegisteredPlayer = 0;
}
?>

<div class="box">
    <div class="box_form">
        <h2>Formulaire pour équipe</h2>
        <div class="formulaire">
            <form id="formulaire-inside" action="../controllers/team_signup.php?player=<?php echo $player?>" method="POST">

                <?php if ($player < $maxPlayer) { ?>
                    <br>
                    <div>
                        <label for="firstName">Prénom</label>
                        <input type="text" name="firstName" id="firstName"
                            <?php if (isset($_SESSION['players'][$player])) { ?> value="<?php echo $_SESSION['players'][$player]['firstName'];?>" <?php }?> >

                        <label for="lastName">Nom</label>
                        <input type="text" name="lastName" id="lastName"
                            <?php if (isset($_SESSION['players'][$player])) { ?> value="<?php echo $_SESSION['players'][$player]['lastName'];?>" <?php }?> >

                        <label for="birthDate">Date de naissance</label>
                        <input type="date" name="birthDate" id="birthDate"
                            <?php if (isset($_SESSION['players'][$player])) { ?> value="<?php echo $_SESSION['players'][$player]['birthDate'];?>" <?php }?> >

                        <label for="email">E-mail</label>
                        <input type="email" name="email" id="email"
                            <?php if (isset($_SESSION['players'][$player])) { ?> value="<?php echo $_SESSION['players'][$player]['email'];?>" <?php }?> >

                        <label for="pseudo">Pseudo</label>
                        <input type="text" name="pseudo" id="pseudo"
                            <?php if (isset($_SESSION['players'][$player])) { ?> value="<?php echo $_SESSION['players'][$player]['pseudo'];?>" <?php }?> >
                    </div>
                    <br>
                    <p style="color: red"><?php if(isset($_GET['error'])){echo $_GET['error'];} ?></p>
                    <br>
                    <input type="submit" id="add" value="Ajouter <?php echo $player +1 . " /" . $maxPlayer?>">
                <?php }?>

<!--                CHOIX DE L'EQUIPE ET DU JEU-->
                <?php if ($maxPlayer == $player) { ?>
                    <label for="teamName">Nom de l'équipe</label>
                    <input type="text" name="teamName" id="teamName">
                    <input type="submit" value="Enregistrer votre équipe">

                    <label for="game">Jeu</label>
                    <select name="game" id="game">
                        <?php foreach ($games as $game){ ?>
                            <option value="<?php echo $game['id']; ?>"><?php echo $game['name'];?></option>
                        <?php }?>
                    </select>

                    <p style="color: red"><?php if(isset($_GET['error'])){echo $_GET['error'];} ?></p>
                <?php }?>
 <!--                FIN DE L'EQUIPE ET DU JEU-->
            </form>

            <?php if ($player > 0) { ?><a href="team_signup.php?player=<?php echo $player - 1 ?>">Précédent</a><?php }?>

            <?php if ($player < $nbRegisteredPlayer && $player < $maxPlayer && $nextable) { ?><a href="../controllers/team_signup.php?player=<?php echo $player + 1 ?>">Suivant</a><?php }?>
        </div>
    </div>
</div>
<?php
include("../templates/footer.php");
?>
