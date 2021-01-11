<?php
include("../templates/header.php");
?>

        <!-- bare de navigation  -->

        <div class="header">
            <div class="header__texture"></div>
            <div class="container">
                <div class="header__navbar">
                    <div class="header__navbar--logo">
                        <h1 ><a href="../index.php" class="header__navbar--logo-title"> PlayGames</a></h1>
                    </div>
                    <div class="header_navbar--menu">
                        <a href="../index.php" class="header__navbar--menu--link">Accueil</a>
                        <a href="admin_log.php" class="header__navbar--menu--link">Administrateur</a>
                        <a href="team_or.php" class="header__navbar--menu--link">Joueur</a>
                    </div>  
                <!--
                    <div class="header__navbar--toggle">
                        <span class="header__navbar--toggle-icons"></span>
                    </div> -->
                </div>
                <div class="header__slogan">
                        <h2 class="header__slogan--title">Tournoi E-Games</h2>
                </div>
            </div>
        </div>

        <!-- selection de la personne  -->
		<div class="boutons__options">
            <div class="container__options">
                <a href ="form_solo.php">
                    <input  type="button" value="SOLO">
                </a>
                <a href ="form_equipe.php">
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