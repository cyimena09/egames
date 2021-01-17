<?php

function sendConfirmMail($dest) {
    $sujet = "Inscription E-Games";
    $headers = "From: Équipe E-Games";
    $message = "
    Félicitation vous êtes maintenant inscrit au tournoi 'E-Games', vous recevrez bientôt les dates de vos matchs. A très vite ! 
    ---------------------
    L'équipe E-Games";

    if (mail($dest, $sujet, $message, $headers)) {
        return true;
    } else {
       false;
    }
}
