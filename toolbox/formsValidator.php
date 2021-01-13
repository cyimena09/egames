<?php

function checkNumber($elem) {
    return (preg_match('#[0-9]#', $elem)) ? true : false ;
}

function checkLetter($elem) {
    return preg_match('#[a-z]#', $elem) || preg_match('#[A-Z]#', $elem);
}

function checkUppercase($elem) {
    return (preg_match('#[A-Z]#', $elem)) ? true : false;
}

function checkFormatMail($elem) {
    return (preg_match('#^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$#', $elem));
}

function checkValidDate($elem){
    if (preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $elem)) {
        return true;
    } else {
        return false;
    }
}

function getAgeFromDate($elem){
    if(checkValidDate($elem)){
        $age = date('Y') - $elem;
        if (date('md') < date('md', strtotime($elem))) {
            return $age - 1;
        }
        return $age;
    }
    return false;
}

function checkEmptyArray($post) {
    foreach ($post as $key => $elem) {
        if (empty($elem)) {
            return true;
        }
    }
}

function checkTrimArray($post) {
    foreach($post as $key => $elem) {
        $_POST[$key] = trim($elem);
    }
}

function htmlSpecialArray($post) {
    foreach($post as $key => $elem) {
        $_POST[$key] = htmlspecialchars($elem);
    }
}
