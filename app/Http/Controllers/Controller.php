<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function internalRequest($route, $method, $data=[])
    {
        $request = Request::create($route, $method, $data);
        $request->headers->set('Accept', 'application/json');
        $response = Route::dispatch($request);
        return json_decode($response->getContent());
    }
}
