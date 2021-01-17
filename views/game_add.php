<?php
include("../templates/header.php");
include("../templates/navbar.php");
?>
<!-- selection de la personne  -->
<div class="box">
    <div class="box_form">
        <h2>Ajouter un jeu</h2>
        <div class="formulaire">
            <form style="display: flex; flex-direction: column; align-items: center" id="formulaire-inside" action="../controllers/game/game_add.php" method="POST">

                <label for="gameName">Nom du jeu</label>
                <input type="text" name="gameName" id="gameName">

                <input type="submit" value="Envoyer">
            </form>
            <p style="color: red"><?php if (isset($_GET['error'])) { echo $_GET['error']; } ?></p>

            <a href="admin_space.php">Retour</a>
        </div>
    </div>
</div>

<?php
include("../templates/footer.php");
?>
