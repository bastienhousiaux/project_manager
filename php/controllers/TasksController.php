<?php

include_once("../dao/TasksDAO.php");

if(isset($_POST["request_type"])){
    switch($_POST["request_type"]){
        case "createTask":
            echo json_encode(createTask($_POST["name"],$_POST["description"]));
            break;
        case "updateTaskName":
            echo json_encode(updateTaskNameById($_POST["id"],$_POST["newName"]));
            break;
        case "updateTaskDescription":
            echo json_encode(updateTaskDescriptionById($_POST["id"],$_POST["newDescription"]));
            break;
        case "deleteTask":
            echo json_encode(deleteTaskById($_POST["id"]));
            break;
        case "addTag":
            echo json_encode(addTagToTask($_POST["task_id"],$_POST["tag_id"]));
            break;
        default:
            echo "wrong request type " . $_POST["request_type"];
    }
}else{
    if(isset($_GET["request_type"])){
        switch($_GET["request_type"]){
            case "getTask":
                echo json_encode(getTaskById($_GET["id"]));
                break;
            case "getTasks":
                echo json_encode(getAllTasks());
                break;
            case "getTags":
                echo json_encode(getAllTagsOfTask($_GET["id"]));
                break;
            default:
                echo "wrong request type " . $_GET["request_type"];
        }
    }
}
?>