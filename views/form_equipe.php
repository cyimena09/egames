<?php
include("../templates/header.php");
include("../templates/navbar.php");
?>
<!-- selection de la personne  -->
<div class="box">
    <div class="box_form">
        <h2>Formulaire pour équipe</h2>
        <div class="formulaire">
            <form id="formulaire-inside" action="../controllers/signin_team.php" method="POST">

                <label for="game">Jeux</label>
                <select name="game" id="game">
                    <option value="lol">Legue of Legends</option>
                    <option value="counter">Counter strike: Global Offensive</option>
                    <option value="overwatch">Overwatch</option>
                </select>
                <br>

                <?php for($i = 0; $i <2;  $i++){ ?>
                    <div style="border: solid red 1px">

                        <label for="firstName">Prénom</label>
                        <input type="text" name="firstName<?php echo $i ?>" id="firstName">

                        <label for="lastName">Nom</label>
                        <input type="text" name="lastName<?php echo $i ?>" id="lastName">

                        <label for="birthDate">Date de naissance</label>
                        <input type="date" name="birthDate<?php echo $i ?>" id="birthDate">

                        <label for="email">E-mail</label>
                        <input type="email" name="email<?php echo $i ?>" id="email">

                        <label for="password">Mot de passe</label>
                        <input type="text" name="password<?php echo $i ?>" id="password">

                        <label for="pseudo">Pseudo</label>
                        <input type="text" name="pseudo<?php echo $i ?>" id="pseudo">
                    </div>
                <?php }?>
                <br>
                <br>

                <input type="submit" value="Envoyer">
            </form>

        </div>
    </div>
</div>
<?php
include("../templates/footer.php");
?>

<?php
include("../templates/header.php");
include("../templates/navbar.php");
?>
