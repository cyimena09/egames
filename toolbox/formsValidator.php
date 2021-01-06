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

function checkEmptyArray($post) {
    foreach ($post as $key => $elem) {
        if (empty($elem)) {
            return $GLOBALS['error'] = $key . ' vide !';
        }
    }
}

function checkTrimArray($post) {
    foreach($post as $key => $elem){
        $_POST[$key] = trim($elem);
    }
}

function htmlSpecialArray($post) {
    foreach($post as $key => $elem){
        $_POST[$key] = htmlspecialchars($elem);
    }
}
