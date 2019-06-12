<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request) {
        // return parent::toArray($request);
        return [
            'server' => env('BACKEND_SERVER'),
            'type'  => 'project',
            'id'    => (string)$this->id,
            'attributes'    => [
                'title' => $this->title,
                'color' => $this->color,
                'total_todos' => count($this->todos),
                'completed_todos' => count($this->todos->where('completed', 1)),
                'created_at'    => $this->created_at,
                'updated_at'    => $this->updated_at,
            ],
            'relationships' => new ProjectRelationshipResource($this),
            'links'         => [
                'self' => route('projects.show', ['article' => $this->id]),
            ],
        ];
    }
}
