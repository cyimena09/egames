<?php
include('../models/read.php');
include('../toolbox/authentication.php');
$logger = getAdmin($_POST['email']); // retourne (s'il existe) un email et un mot de passe correspondant à l'email en paramètre
$error = null;
if (!is_null($logger)) {
    $email = $logger['email'];
    $passDB = $logger['password'];
    checkAuth($_POST['email'],$_POST['password'], $email, $passDB);  // on vérifie si les emails et les mots de passe concordent

    if ($error == 'ok') {
        header("Location: ../views/admin_space.php");
    } else{
        header("Location: ../views/admin_log.php?error='.$error");
        var_dump($logger);

    }
}