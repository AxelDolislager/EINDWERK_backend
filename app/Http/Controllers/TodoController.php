<?php

namespace App\Http\Controllers;

use App\Todo;
use App\Project;
use App\Http\Resources\TodoResource;
use App\Http\Resources\TodosResource;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class TodoController extends Controller{
    public function index(){
        return new TodosResource(Todo::paginate());
    }
    public function create(){
        //
    }
    public function store(Request $request){
        $todo = new Todo;
        $todo->project_id = $request->project_id;
        $todo->title = $request->title;
        $todo->save();
        
        return ("Added via " . env('BACKEND_SERVER'));
    }
    public function show(Todo $todo){
        TodoResource::withoutWrapping();

        return new TodoResource($todo);
    }
    public function edit(Todo $todo){
        //
    }
    public function update(Request $request, Todo $todo){
        if($todo->completed == true){
            $todo->update(['completed' => false]);
        }else{
            $todo->update(['completed' => true]);
            return ("Added via " . env('BACKEND_SERVER'));
        }
    }
    public function destroy(Todo $todo){
        //
    }
}
