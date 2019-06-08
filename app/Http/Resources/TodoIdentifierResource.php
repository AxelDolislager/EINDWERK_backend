<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TodoIdentifierResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     *
     * @return array
     */
    public function toArray($request)
    {
        return [
            'type'          => 'todos',
            'id'            => (string)$this->id,
            'attributes'    => [
                'title'          => $this->title,
                'completed'     => $this->completed,
                'created_at'    => $this->created_at,
                'updated_at'    => $this->updated_at,
            ],
        ];
    }
}
