<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\User;
use App\Models\Place;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

}
