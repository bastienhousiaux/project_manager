<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
include_once("dao/ClientQueryBuilder.php");
require 'libs/vendor/autoload.php';

$app = new \Slim\App();

include_once("routes/Routes.php");

// $app->get('/hello/{name}', function (Request $request, Response $response, array $args) {
//     $name = $args['name'];
//     $response->getBody()->write("Hello, $name");
//     return $response;
// });

// $app->get('/tasks',function(){
//     echo select("tasks");
// });
// $app->get('/task/{id}',function(Request $request, Response $response, array $args){
//     echo selectOne("tasks",["*"],"task_id=".$args["id"]);
// });
// $app->post('/task/{id}/update',function(Request $request, Response $response,array $args){
//     $data=$request->getParsedBody();
//     echo update("tasks",$data,"task_id=".$args["id"]);
// });



$app->run();