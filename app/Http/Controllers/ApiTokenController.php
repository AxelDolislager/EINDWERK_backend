<?php

namespace App\Http\Controllers;

use App\User;

use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ApiTokenController extends Controller{
    /**
     * Update de geauthoriseerde gebruiker's API token.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    // public function update(Request $request){
    //     $token = Str::random(60);

    //     $request->user()->forceFill([
    //         'api_token' => hash('sha256', $token),
    //     ])->save();

    //     return ['token' => $token];
    // }
}