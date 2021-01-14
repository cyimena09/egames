<?php
include("../templates/header.php");
include("../templates/navbar.php");
?>

<!-- selection de la personne  -->
<div class="boutons__options">
    <div class="container__options">
        <a href ="solo_signup.php">
            <input  type="button" value="SOLO">
        </a>
        <a href ="team_signup.php">
            <input type="button" value="EQUIPE">
        </a>
    </div>
</div>

<script>
    src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
    crossorigin="anonymous"></script>
<script type="text/javascript" src="style/js/options.js"></script>

<?php
include("../templates/footer.php");
?>
