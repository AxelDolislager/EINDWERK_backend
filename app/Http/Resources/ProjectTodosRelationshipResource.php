<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ProjectTodosRelationshipResource extends ResourceCollection{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request
     *
     * @return array
     */
    public function toArray($request){
        $project = $this->additional['project'];
        return [
            'data'  => TodoIdentifierResource::collection($this->collection),
            'links' => [
                'self'    => route('projects.relationships.todos', ['project' => $project->id]),
                'related' => route('projects.todos', ['project' => $project->id]),
            ],
        ];
    }
    public function with($request){
        return [
            'links' => [
                'self' => route('projects.index'),
            ],
        ];
    }
}