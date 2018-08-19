<?php
include_once("dao/ClientQueryBuilder.php");

/**
* CREATE
*/

function createTask($name,$description){
    echo insert("tasks",["task_name"=>$name,"task_description"=>$description]);
}

/**
* READ
*/

function getTaskById($id){
    global $bdd;
    echo(selectOne("tasks",["task_id","task_name","task_description"],"task_id=$id"));
}

function getAllTasks(){
    echo(select("tasks",["task_id","task_name","task_description"]));
}


/**
* UPDATE
*/

function updateTaskById($id,$data){
    echo update("tasks",$data,"task_id=$id",["task_name","task_description"]);
}

/**
* DELETE
*/

function deleteTaskById($id){
    echo delete("tasks","task_id=$id");
}



function addTagToTask($task_id,$tag_id){
    echo insert("tasks_tags",["task_id"=>$task_id,"tag_id"=>$tag_id]);
}

function getAllTagsOfTask($task_id){
    echo selectJoin("tags","tags.tag_id,tags.tag_name,tags.tag_description",
    [
        ["tasks_tags","tags.tag_id","tasks_tags.tag_id"],
        ["tasks","tasks.task_id","tasks_tags.task_id"]
    ]);
}
?>