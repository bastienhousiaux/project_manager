<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'libs/vendor/autoload.php';

$app = new \Slim\App(include_once("db_config.php"));

//get all container items
 
$container = $app->getContainer();
//boot eloquent connection
 
$capsule = new \Illuminate\Database\Capsule\Manager;
 
$capsule->addConnection($container['settings']['db']);
 
$capsule->setAsGlobal();
 
$capsule->bootEloquent();

// $container['db'] = function ($container) {
//     $capsule = new \Illuminate\Database\Capsule\Manager;
//     $capsule->addConnection($container['settings']['db']);

//     $capsule->setAsGlobal();
//     $capsule->bootEloquent();

//     return $capsule;
// };

// $container[App\WidgetController::class] = function ($c) {
//     $view = $c->get('view');
//     $logger = $c->get('logger');
//     $table = $c->get('db')->table('table_name');
//     return new \App\WidgetController($view, $logger, $table);
// };

$container['db'] = function ($container) use ($capsule){
 
    return $capsule;
  
 };
  
 $container['HomeController'] = function ($container) {
    return new \App\Controllers\HomeController($container);
  
 };

 use Illuminate\Database\Eloquent\Model;
 
class User extends Model{
   protected $table = 'tasks';
   protected $fillable = ['name','description'];
}
 

$app->get('/hello/{name}', function (Request $request, Response $response, array $args) {
    $name = $args['name'];
    $response->getBody()->write("Hello, $name");

    // $create = User::create([
 
    //     'name' => 'jane doe',

    //     'email' => 'janedoe@cloudways.com',

    //     'password' => 'iamstupid',

    // ]);
    // var_dump($create);
    $tasks = $this->container->db->table('tasks')->get();
    var_dump($tasks);
    return $response;
});
$app->run();