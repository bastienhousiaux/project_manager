<?php
include_once("ClientQueryBuilder.php");

/**
* CREATE
*/

function createTask($name,$description){
    global $bdd;
    return $bdd->query("INSERT INTO tasks(task_name,task_description) VALUES('".$name."','".$description."')");
}

/**
* READ
*/

function getTaskById($id){
    global $bdd;
    // return $bdd->query("SELECT task_id,task_name,task_description FROM tasks WHERE task_id=$id")->fetch();
    var_dump(selectOne("tasks",["task_id","task_name","task_description"],"task_id=$id"));
}

function getAllTasks(){
    global $bdd;
    // return queryResponseToArray($bdd->query("SELECT task_id,task_name,task_description FROM tasks"));
    var_dump(select("tasks",["task_id","task_name","task_description"]));
}

getTaskById(2);

/**
* UPDATE
*/

function updateTaskNameById($id,$newName){
    global $bdd;
    return $bdd->query("UPDATE tasks SET task_name='$newName' WHERE task_id=$id");
}

function updateTaskDescriptionById($id,$newDescription){
    global $bdd;
    return $bdd->query("UPDATE tasks SET task_description='$newDescription' WHERE task_id=$id");
}

/**
* DELETE
*/

function deleteTaskById($id){
    global $bdd;
    return $bdd->query("DELETE FROM tasks WHERE task_id=$id");
}



function addTagToTask($task_id,$tag_id){
    global $bdd;
    return $bdd->query("INSERT INTO tasks_tags(task_id,tag_id) VALUES($task_id,$tag_id)");
}

function getAllTagsOfTask($task_id){
    global $bdd;
    return queryResponseToArray($bdd->query("SELECT tag.tag_id,tag.tag_name,tag.tag_description FROM tags
    JOIN tasks_tags ON tags.tag_id=tasks_tags.tag_id JOIN tasks ON tasks.task_id=tasks_tags.tasks_id"));
}
?>