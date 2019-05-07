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
            'type'          => 'todos',
            'id'            => (string)$this->id,
            'attributes' => [
                'body' => $this->body,
                'completed' => $this->completed,
            ],
            'relationships' => new TodoRelationshipResource($this),
            'links'      => [
                'self' => route('todos.show', ['todo' => $this->id]),
            ],
        ];
    }
}
