<?php
include("../toolbox/formsValidator.php");
include("../models/insert.php");
// Variable de check d'erreur
var_dump($_POST);



$teamId = 1; // the value 1 in the 'FK_Team'column is reserved for single players

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