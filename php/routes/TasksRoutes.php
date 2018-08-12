<?php
$app->get('/tasks/{id}',function(Request $request, Response $response,array $args){
    include_once("controllers/TasksController.php");
    echo getTaskById($args['id']);
});

$app->get('/tasks',function(){
    include_once("controllers/TasksController.php");
    echo getAllTasks();
});

$app->post('/tasks/create',function(Request $request, Response $response){
    include_once("controllers/TasksController.php");
    $data=$request->getParsedBody();
    echo insertTask($data["name"],$data["description"]);
});

$app->post('/tasks/{id}/update',function(Request $request, Response $response){
    include_once("controllers/TasksController.php");
    $data=$request->getParsedBody();
    echo updateTask($data["id"],$data);
});

$app->post('/tasks/{id}/delete',function(Request $request, Response $response){
    include_once("controllers/TasksController.php");
    $data=$request->getParsedBody();
    echo deleteTask($data["id"]); 
});

?>