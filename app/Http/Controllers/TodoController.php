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
        //
    }
    public function show(Todo $todo){
        TodoResource::withoutWrapping();

        return new TodoResource($todo);
    }
    public function edit(Todo $todo){
        //
    }
    public function update(Request $request, Todo $todo){
        //
    }
    public function destroy(Todo $todo){
        //
    }
}
