<?php
use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::resource('/projects', 'ProjectController');
Route::resource('/todos', 'TodoController');

Route::get('projects/{project}/relationships/todos',
    [
        'uses' => \App\Http\Controllers\ProjectRelationshipController::class . '@todos',
        'as' => 'projects.relationships.todos',
    ]
);
Route::get('projects/{project}/todos',
    [
        'uses' => \App\Http\Controllers\ProjectRelationshipController::class . '@todos',
        'as' => 'projects.todos',
    ]
);