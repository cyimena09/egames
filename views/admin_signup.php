<?php
include("../templates/header.php");
include("../templates/navbar.php");
?>
<h2>Nouvel administrateur</h2>

<div style="margin-left: 45%" >

    <form style="display: flex; flex-direction: column" action="../controllers/admin_signup.php" method="post">
        <label for="firstName">Prénom</label>
        <input id="firstName" type="text" name="firstName"/>

        <label for="lastName">Nom</label>
        <input id="lastName" type="text" name="lastName"/>

        <label for="email">Email</label>
        <input id="email" type="text" placeholder="Ajouter un email" name="email"/>

        <label for="password">Mot de passe</label>
        <input id="password" type="password" name="password" placeholder="Attribuer un mot de passe"/>

        <label for="confirmPassword">Confirmer le mot de passe</label>
        <input id="confirmPassword" type="password" name="confirmPassword" placeholder="Confirmer le mot de passe">

        <input type="submit" value="Enregistrer" />
    </form>
    <div style="color: red;" class="error"><?php if(isset($_GET['error'])){ echo $_GET['error']; } ?></div>
</div>

<?php
include("../templates/footer.php");
