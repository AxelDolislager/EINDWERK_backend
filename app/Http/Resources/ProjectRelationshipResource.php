<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProjectRelationshipResource extends JsonResource{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request){
        // return parent::toArray($request);

        return [
            'todos' => (new ProjectTodosRelationshipResource($this->todos))->additional(['project' => $this]),
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
