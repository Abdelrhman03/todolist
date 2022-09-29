<?php 
    require "_init.php";
    
   use App\Core\Router;
   use App\Core\Request;
   use App\Controllers\TaskControllers;
    // first way to create this program 
    
    // Router::make()   // make will return object from class Router ;
    // ->get('', 'app/Controllers/index.php')   // will append into object that created from make this value get["" => "app/Controllers/index.php "]
    // ->get('about', 'app/Controllers/about.php') // will do the same thing above 
    // ->post('task/create', 'app/Controllers/task.create.php') // will do the same thing above but in post[]
    // ->resolve(Request::uri(), Request::method());
    
        
    Router::make()  
    ->get('', [TaskControllers::class,"index"])
    ->get('about',[TaskControllers::class,"about"])
    ->get('task/update', [TaskControllers::class,"update"]) 
    ->get('task/delete', [TaskControllers::class,"delete"])  
    ->post('task/create', [TaskControllers::class,"create"]) 
    ->resolve(Request::uri(), Request::method());  // we should define all post and get method in website 
    


?>