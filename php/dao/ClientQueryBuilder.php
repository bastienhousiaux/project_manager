<?php
    // namespace ClientQueryBuilder;

    $bdd = new PDO('mysql:host=localhost;dbname=project_manager_app;charset=utf8', 'root', '');

    function queryResponseToArray($queryResponse){
        $responseArray=array();
        while($row=$queryResponse->fetch(PDO::FETCH_ASSOC)){

            array_push($responseArray,$row);
        }
        return $responseArray;
    }

    function select($table,$champs,$where=1,$orderBy=1){
        global $bdd;
        return json_encode(queryResponseToArray($bdd->query("SELECT ".implode(",",$champs)." FROM $table WHERE $where")));
    }

    function selectOne($table,$champs,$where=1){
        global $bdd;
        return json_encode($bdd->query("SELECT ".implode(",",$champs)." FROM $table WHERE $where")->fetch(PDO::FETCH_ASSOC));
    }

    function insert($table,$values){
        global $bdd;
        echo "INSERT INTO $table(".implode(",",array_keys($value)).") VALUES('".$name."','".$description."')"
        // return $bdd->query("INSERT INTO tasks(task_name,task_description) VALUES('".$name."','".$description."')");
    }
?>