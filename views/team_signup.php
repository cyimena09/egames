<?php
session_start();
include("../templates/header.php");
include("../templates/navbar.php");
include("../models/read.php");


$maxPlayer = 1; // Nombre de joueur max pour la compétition
$games = getGames();

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
            <form id="formulaire-inside" action="../controllers/team_signup.php" method="POST">



                <label for="game">Jeu</label>
                <select name="game" id="game">
                    <?php foreach ($games as $game){ ?>
                    <option value="<?php echo $game['id']; ?>"><?php echo $game['name']; ?></option>
                    <?php }?>
                </select>
                <br>


                    <div>

                        <label for="firstName">Prénom</label>
                        <input type="text" name="firstName" id="firstName">

                        <label for="lastName">Nom</label>
                        <input type="text" name="lastName" id="lastName">

                        <label for="birthDate">Date de naissance</label>
                        <input type="date" name="birthDate" id="birthDate">

                        <label for="email">E-mail</label>
                        <input type="email" name="email" id="email">

                        <label for="password">Mot de passe</label>
                        <input type="text" name="password" id="password">

                        <label for="pseudo">Pseudo</label>
                        <input type="text" name="pseudo" id="pseudo">
                    </div>

                <br>
                <br>

                <input type="submit" value="Ajouter <?php echo $nbRegisteredPlayer . " /" . $maxPlayer?>" <?php if ($nbRegisteredPlayer == $maxPlayer) { ?> disabled <?php }?>>

                <?php if ($nbRegisteredPlayer == $maxPlayer) { ?>
                    <label for="teamName">Nom de l'équipe</label>
                    <input type="text" name="teamName" id="teamName">
                    <input type="submit" value="Enregistrer votre équipe">
                <?php }?>
            </form>



        </div>
    </div>
</div>
<?php
include("../templates/footer.php");
?>
