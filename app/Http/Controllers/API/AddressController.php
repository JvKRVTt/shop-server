<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\AddressResource;

class AddressController extends Controller
{
    public function index()
    {
        return AddressResource::collection(auth()->user()->company->addresses);
    }
}
