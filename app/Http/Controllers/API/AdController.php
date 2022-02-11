<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\AdResource;
use App\Models\Ad;

class AdController extends Controller
{
    public function index()
    {
        return AdResource::collection(Ad::all());
    }
}
