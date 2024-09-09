<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePlaceRequest;
use App\Http\Resources\PlaceResource;
use App\Models\Place;
use App\Services\PlaceService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class PlaceController extends Controller
{
    public $placeService;
    public $userService;

    public function __construct(UserService $userService, PlaceService $placeService)
    {
        $this->userService = $userService;
        $this->placeService = $placeService;
    }
    public function index()
    {
        $places = $this->placeService->all();
        return PlaceResource::collection($places);
    }
    public function store(StorePlaceRequest $request)
    {
        $this->authorize('create', Place::class);

        $data = $request->validated();
        $place = $this->placeService->create($data);
        return new PlaceResource($place);
    }
    public function show(Place $place)
    {
        return new PlaceResource($place);
    }

    public function addToUser(Place $place)
    {
        $this->authorize('addToUser', Place::class);
        $user = auth()->user();
        
        $place = $this->userService->addPlaceToUser($place, $user);
        $response = $place instanceof Place ? new PlaceResource($place) : $place;

        return $response;
    }
    public function removeFromUser(Place $place)
    {
        $this->authorize('removeFromUser', Place::class);
        $user = auth()->user();
        
        $place = $this->userService->removePlaceFromUser($place, $user);
        $response = $place instanceof Place ? new PlaceResource($place) : $place;

        return $response;
    }
}
