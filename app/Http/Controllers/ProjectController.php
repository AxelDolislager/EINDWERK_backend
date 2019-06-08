<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProjectResource;
use App\Http\Resources\ProjectsResource;
use App\Http\Resources\ProjectRelationshipResource;
use App\Project;
use App\Todo;
use Illuminate\Http\Request;

class ProjectController extends Controller{
    public function index(){
        return new ProjectsResource(Project::paginate());
    }
    public function create(){
        //
    }
    public function store(Request $request){
        $project = new Project;
        $project->title = $request->title;
        $project->color = $request->color;
        $project->save();
        
        return ("Added via " . env('BACKEND_SERVER'));
    }
    public function show(Project $project){
        ProjectResource::withoutWrapping();

        return new ProjectResource($project);
    }
    public function edit(Project $project){
        //
    }
    public function update(Request $request, Project $project){
        //
    }
    public function destroy(Project $project){
        //
    }
}
