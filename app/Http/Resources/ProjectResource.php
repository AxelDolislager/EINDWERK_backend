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
            'server'    => env('BACKEND_SERVER'),
            'type'  => 'projects',
            'id'    => (string)$this->id,
            'attributes'    => [
                'title' => $this->title,
                'body'  => $this->body,
            ],
            'relationships' => new ProjectRelationshipResource($this),
            'links'         => [
                'self' => route('projects.show', ['article' => $this->id]),
            ],
        ];
    }
}
