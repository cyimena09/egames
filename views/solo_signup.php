<?php
include("../models/read.php");
include("../templates/header.php");
include("../templates/navbar.php");
$games = getGames();
?>
<!-- selection de la personne  -->
<div class="box">
    <div class="box_form">
        <h2>Formulaire pour Solo</h2>
        <div class="formulaire">
            <form id="formulaire-inside" action="../controllers/solo_signup.php" method="POST">

                <label for="firstName">Prénom</label>
                <input type="text" name="firstName" id="firstName">

                <label for="lastName">Nom</label>
                <input type="text" name="lastName" id="lastName">

                <label for="birthDate">Date de naissance</label>
                <input type="date" name="birthDate" id="birthDate">

                <label for="email">E-mail</label>
                <input type="email" name="email" id="email">

                <label for="pseudo">Pseudo</label>
                <input type="text" name="pseudo" id="pseudo">

                <label for="game">Jeu</label>
                <select name="game" id="game">
                    <?php foreach ($games as $game){ ?>
                        <option value="<?php echo $game['id']; ?>"><?php echo $game['name'];?></option>
                    <?php }?>
                </select>
                <br>
                <br>
                <input type="submit" value="Envoyer">
            </form>

            <p style="color: red"><?php if(isset($_GET['error'])){echo $_GET['error'];} ?></p>

        </div>
    </div>
</div>
<?php
include("../templates/footer.php");
?>
