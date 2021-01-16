<?php
session_start();
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
            <form style="display: flex; flex-direction: column; align-items: center" id="formulaire-inside" action="../controllers/solo/solo_signup.php" method="POST">

                <label for="firstName">Prénom</label>
                <input type="text" name="firstName" id="firstName"
                    <?php if (isset($_SESSION['soloPlayer'])) { ?> value="<?php echo $_SESSION['soloPlayer']['firstName'];?>" <?php }?> >

                <label for="lastName">Nom</label>
                <input type="text" name="lastName" id="lastName"
                    <?php if (isset($_SESSION['soloPlayer'])) { ?> value="<?php echo $_SESSION['soloPlayer']['lastName'];?>" <?php }?>>

                <label for="birthDate">Date de naissance</label>
                <input type="date" name="birthDate" id="birthDate"
                    <?php if (isset($_SESSION['soloPlayer'])) { ?> value="<?php echo $_SESSION['soloPlayer']['birthDate'];?>" <?php }?>>

                <label for="email">E-mail</label>
                <input type="email" name="email" id="email"
                    <?php if (isset($_SESSION['soloPlayer'])) { ?> value="<?php echo $_SESSION['soloPlayer']['email'];?>" <?php }?>>

                <label for="pseudo">Pseudo</label>
                <input type="text" name="pseudo" id="pseudo"
                    <?php if (isset($_SESSION['soloPlayer'])) { ?> value="<?php echo $_SESSION['soloPlayer']['pseudo'];?>" <?php }?>>

                <label for="game">Jeu</label>
                <select name="game" id="game">
                    <?php foreach ($games as $game){ ?>
                        <option value="<?php echo $game['id']; ?>"><?php echo $game['name'];?></option>
                    <?php }?>
                </select>

                <input type="submit" value="Envoyer">
            </form>

            <p style="color: red"><?php if(isset($_GET['error'])){echo $_GET['error'];} ?></p>

        </div>
    </div>
</div>
<?php
include("../templates/footer.php");
?>
