<?php
include('../models/insert.php');
include("../toolbox/formsValidator.php");
$admin = $_POST;
$error = true;

if (checkEmptyArray($admin)) {
    $error = urlencode("veuillez remplir tous les champs");
    header("Location: ../views/solo_signup.php?error=$error");
} elseif (checkNumber($admin['firstName']) || checkNumber($admin['lastName'])) {
    $error = urlencode("Le prénom et le nom ne peuvent pas contenir de chiffres");
    header("Location: ../views/solo_signup.php?error=$error");
} elseif (!checkFormatMail($admin['email'])) {
    $error = urlencode("L'email n'est pas correct");
    header("Location: ../views/solo_signup.php?error=$error");
} else {
    $error = false;
}

if ($error == false) {
    createAdmin($admin);
    header("Location: ../views/success_admin_signup.php");
}
