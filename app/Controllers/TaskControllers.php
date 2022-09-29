<?php


namespace App\Controllers;
// TaskControllers files this file will manage all request of create delete , update  
// controllers all files this manage the processes between html and php   
use App\Core\Request;
use App\Database\QueryBuilder;

class TaskControllers
{
    public function index()
    {
        $completed = Request::get("completed");
        if($completed != NULL)
        {
            $tasks = QueryBuilder::get("tasks",["completed","=", $completed]);
        }
        else
        {
            $tasks = QueryBuilder::get("tasks");

        }
        view("index",[
            'tasks'=> $tasks
        ]);
    }

    public function about(){
        view("about");
    }

    public function create()
    {
        $description = $_POST["description"];

        QueryBuilder::insert("tasks", [
            "description" => $description,
        ]);

        redirect(home());
    }
    public function update()
    {
        $completed = Request::get("completed");
        $id = Request::get("id");
        if ($id == !NULL && $completed != NULL)
        {
            QueryBuilder::update("tasks",[
                "completed" =>  $completed,
            ], $id);
        }

        back();    
    }

    public function delete()
    {
        if ($id = Request::get("id"))
        {
            QueryBuilder::delete("tasks",$id);
        }

        back();
        }
}
