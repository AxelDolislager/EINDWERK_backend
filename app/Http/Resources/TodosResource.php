<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Collection;

class TodosResource extends ResourceCollection{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request
     *
     * @return array
     */
    public function toArray($request){
        return [
            'server' => env('BACKEND_SERVER'),
            'data' => TodoResource::collection($this->collection),
        ];
    }
    public function with($request){
        // $included  = $this->collection->map(
        //     // function ($project) {
        //     //     return $project->author;
        //     // }
        // )->unique();
        return [
            'links'    => [
                'self' => route('projects.index'),
            ],
            'included' => $this
        ];
    }
    private function withIncluded(Collection $included)
    {
        return $included->map(
            // function ($include) {
            //     if ($include instanceof People) {
            //         return new PeopleResource($include);
            //     }
            // }
        );
    }
}