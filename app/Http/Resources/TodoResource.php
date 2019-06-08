<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TodoResource extends JsonResource{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     *
     * @return array
     */
    public function toArray($request){
        return [
            'server'    => env('BACKEND_SERVER'),
            'type'      => 'todos',
            'id'        => (string)$this->id,
            'project_id' => (string)$this->project_id,
            'attributes' => [
                'title'          => $this->body,
                'completed'     => $this->completed,
                'created_at'    => $this->created_at,
                'updated_at'    => $this->updated_at,
            ],
            'relationships' => new TodoRelationshipResource($this),
            'links'      => [
                'self' => route('todos.show', ['todo' => $this->id]),
            ],
        ];
    }
}
