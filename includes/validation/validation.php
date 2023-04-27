<?php

function validate_username($username){
    if (preg_match("/^[a-zA-Z0-9_-]{3,20}$/", $username)) {
        return true;
    } else {
        return false;
    }
}

function validate_email($email){
    if (preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $email)) {
        return true;
    } else {
        return false;
    }
}

function validate_password($password){
    if (preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#\$%\^&\*])(?!.*[.\s]).{8,}$/", $password)) {
        return true;
    } else {
        return false;
    }
}

function validate_firstname($firstname){
    if (preg_match("/^[a-zA-Z- ]{2,50}$/", $firstname)) {
        return true;
    } else {
        return false;
    }
}
function validate_lastname($lastname){
    if (preg_match("/^[a-zA-Z- ]{2,50}$/", $lastname)) {
        return true;
    } else {
        return false;
    }
}
?>