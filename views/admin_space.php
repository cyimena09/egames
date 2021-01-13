<?php
include("../models/read.php");

$players = getPlayers();
echo '<pre>' , var_dump($players) , '</pre>';

echo "Bienvenue dans l'espace administrateur";