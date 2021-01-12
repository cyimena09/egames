<?php
include("../templates/header.php");
include ("../templates/navbar.php")
?>
<!-- selection de la personne  -->
<div class="boutons__options">
    <div class="container__options">
        <a href="admin_log.php">
            <input type="button" value="ADMINISTRATEUR">
        </a>
        <a href="team_or_solo.php">
            <input type="button" value="JOUEUR">
        </a>
    </div>
</div>
<?php
include("../templates/footer.php");
?>
