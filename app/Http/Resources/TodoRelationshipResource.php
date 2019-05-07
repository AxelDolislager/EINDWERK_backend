<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TodoRelationshipResource extends JsonResource{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request
     *
     * @return array
     */
    public function toArray($request){
        // return [
        //     'author'   => [
        //         'data'  => new AuthorIdentifierResource($this->author),
        //     ],
        // ];
        return [];
    }
    public function with($request){
        return [
            'links' => [
                'self' => route('comments.index'),
            ],
        ];
    }
}
