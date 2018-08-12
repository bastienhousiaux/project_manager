<?php
$bdd = new PDO('mysql:host=localhost;dbname=project_manager_app;charset=utf8', 'root', '');

function queryResponseToArray($queryResponse){
    $responseArray=array();
    while($row=$queryResponse->fetch(PDO::FETCH_ASSOC)){

        array_push($responseArray,$row);
    }
    return $responseArray;
}

?>