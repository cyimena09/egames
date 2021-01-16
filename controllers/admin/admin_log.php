<?php
include('../../models/read.php');
include('../../toolbox/authentication.php');
include('../../toolbox/formsValidator.php');

if (checkEmptyArray($_POST)) {
    $error = urlencode("Veuillez compléter tous les champs.");
    header("Location: ../../views/admin_log.php?error=$error");
} else {
    $logger = getAdminByEmail($_POST['email']); // retourne (s'il existe) un email et un mot de passe correspondant à l'email en paramètre
    $error = null;

    if (!is_null($logger)) {
        $email = $logger['email'];
        $passDB = $logger['password'];
        checkAuth($_POST['email'],$_POST['password'], $email, $passDB);  // on vérifie si les emails et les mots de passe concordent

        if ($error == 'ok') { // si si les emails et les mots de passe concordent error vaut 'ok'
            // => accès à l'espace admin
            header("Location: ../../views/admin_space.php");
        } else {
            // on retourne au formulaire d'accès
            header("Location: ../../views/admin_log.php?error=$error");
        }
    }
}
