<?php
include("../templates/header.php");
include("../templates/navbar.php");
?>
<!-- selection de la personne  -->
<div class="box">
    <div class="box_form">
        <h2>Formulaire pour Solo</h2>
        <div class="formulaire">
            <form id="formulaire-inside" action="../controllers/signin_single_player.php" method="POST">

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

                <label for="game">Jeux</label>
                <select name="game" id="game">
                    <option value="lol">Legue of Legends</option>
                    <option value="counter">Counter strike: Global Offensive</option>
                    <option value="overwatch">Overwatch</option>
                </select>
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
