<?php
include("../toolbox/formsValidator.php");
include("../models/insert.php");

$teamId = 1; // le teamID vaut 1 lorsque le joueur est seul cela correspond à 'Aucune équipe' dans la Db

createPlayer($_POST, 1);

//
//$error = null;
//htmlSpecialArray($_POST);
//checkEmptyArray($_POST);
//checkTrimArray($_POST);
//if($error==null){
//    if($_POST['Password'] == $_POST['ConfirmPassword']){
//        $error = "ok";
//    }
//    else {
//        $error = 'Les mots de passe ne correspondent pas';
//    }
//}
////REDIRECTIONS
//if($error == 'ok'){
//    insertAdmin($_POST);
//    header('Location: ../view/confirmAdminRegister.php');
//}else{
//    header('Location: ../view/adminRegister.php?erreur='.$error);
//}