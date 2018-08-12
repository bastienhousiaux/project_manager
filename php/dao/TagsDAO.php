<?php
include_once("DAOUtils.php");

/**
* CREATE
*/

function createTag($name,$color,$description){
    global $bdd;
    return $bdd->query("INSERT INTO tags(tag_name,tag_color,tag_description) VALUES('$name','$color','$description')");
}

/**
* READ
*/

function getTagById($id){
    global $bdd;
    return $bdd->query("SELECT tag_id,tag_name,tag_color,tag_description FROM tags WHERE tag_id=$id")->fetch();
}

function getAllTags(){
    global $bdd;
    return queryResponseToArray($bdd->query("SELECT tag_id,tag_name,tag_color,tag_description FROM tags"));
}

/**
* UPDATE
*/

function updateTagNameById($id,$newName){
    global $bdd;
    return $bdd->query("UPDATE tags SET tag_name='$newName' WHERE tag_id=$id");
}

function updateTagColorById($id,$newColor){
    global $bdd;
    return $bdd->query("UPDATE tags SET tag_color='$newColor' WHERE tag_id=$id");
}

function updateTagDescriptionById($id,$newDescription){
    global $bdd;
    return $bdd->query("UPDATE tags SET tag_description='$newDescription' WHERE tag_id=$id");
}

/**
* DELETE
*/

function deleteTagById($id){
    global $bdd;
    return $bdd->query("DELETE FROM tags WHERE tag_id=$id");
}


?>