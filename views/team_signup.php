<?php
session_start();
//session_destroy();
include("../templates/header.php");
include("../templates/navbar.php");
include("../models/read.php");
include ("../configuration.php");
$games = getGames();
if (isset($_GET['player'])){
    $player = $_GET['player'];
} else {
    $player = 0;
}

$previousPlayer = null;
if(isset($_GET['player'])) {
    $previousPlayer = $_GET['player'];
}
if(isset($_SESSION['players'])){
    $nbRegisteredPlayer = count($_SESSION['players']);
    echo '<pre>' , var_dump($_SESSION['players']) , '</pre>';
} else {
    $nbRegisteredPlayer = 0;
}
?>
<!-- selection de la personne  -->
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

                        <label for="password">Mot de passe</label>
                        <input type="text" name="password" id="password"
                            <?php if (isset($_SESSION['players'][$player])) { ?> value="<?php echo $_SESSION['players'][$player]['password'];?>" <?php }?> >

                        <label for="pseudo">Pseudo</label>
                        <input type="text" name="pseudo" id="pseudo"
                            <?php if (isset($_SESSION['players'][$player])) { ?> value="<?php echo $_SESSION['players'][$player]['pseudo'];?>" <?php }?> >
                    </div>
                    <br>
                    <br>
                    <input type="submit" id="add" value="Ajouter <?php echo $player +1 . " /" . $maxPlayer?>">
                <?php }?>

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
                <?php }?>
            </form>

            <?php if ($player > 0) { ?><a href="team_signup.php?player=<?php echo $player - 1 ?>">Précédent</a><?php }?>

            <?php if ($player < $nbRegisteredPlayer) { ?><a href="team_signup.php?player=<?php echo $player + 1 ?>">Suivant</a><?php }?>
        </div>
    </div>
</div>
<?php
include("../templates/footer.php");
?>
