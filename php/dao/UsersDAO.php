<?php
include_once("DAOUtils.php");

/**
* CREATE
*/

function createUser($name){
    global $bdd;
    return $bdd->query("INSERT INTO users(user_name) VALUES('$name')");
}

/**
* READ
*/

function getUserById($id){
    global $bdd;
    return $bdd->query("SELECT user_id,user_name FROM users WHERE user_id=$id")->fetch();
}

function getAllUsers(){
    global $bdd;
    return queryResponseToArray($bdd->query("SELECT user_id,user_name FROM users"));
}

/**
* UPDATE
*/

function updateUserNameById($id,$newName){
    global $bdd;
    return $bdd->query("UPDATE users SET user_name='$newName' WHERE user_id=$id");
}


/**
* DELETE
*/

function deleteUserById($id){
    global $bdd;
    return $bdd->query("DELETE FROM users WHERE user_id=$id");
}


?>