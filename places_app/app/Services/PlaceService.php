<?php

namespace App\Services;

use App\Models\Place;

class PlaceService
{
    public function all()
    {
        return Place::all();
    }
    public function create($data)
    {
        return Place::create($data);
    }
}
