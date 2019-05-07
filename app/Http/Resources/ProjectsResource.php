<?php

namespace App\Http\Resources;
use App\Comment;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Collection;

class ProjectsResource extends ResourceCollection {
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request) {
        // return parent::toArray($request);
        return [
            'data' => ProjectResource::collection($this->collection),
        ];
    }
    public function with($request) {
        $todos = $this->collection->flatMap(
            function ($project) {
                return $project->todos;
            }
        );
        $included = $todos->unique();
        return [
            'links'    => [
                'self' => route('projects.index'),
            ],
            'included' => $this->withIncluded($included),
        ];
    }
    private function withIncluded(Collection $included){
        return $included->map(
            function ($include) {
                if ($include instanceof Todo) {
                    return new TodoResource($include);
                }
            }
        );
    }
}
