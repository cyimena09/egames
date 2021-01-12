<?php

function checkAuth($login, $password, $loginDB, $passDB) {
    if (isset($login) AND isset($password)) {
        if(empty($login)) {
            $GLOBALS['error'] = 'Veuillez indiquer votre login svp !';
        } elseif(empty($password)) {
            $GLOBALS['error'] = 'Veuillez indiquer votre mot de passe svp !';
        } elseif($login !== $loginDB) {
            echo "Login = ". $loginDB;
            $GLOBALS['error'] = 'Votre login est faux !';
        } elseif(!password_verify($password, $passDB)) {
            $GLOBALS['error'] = "Le mot de passe n'est pas correct";
        } else{
            $GLOBALS['error'] = 'ok';
        }
    } else {
        $GLOBALS['error'] = 'login ou mdp pas present';
    }
}