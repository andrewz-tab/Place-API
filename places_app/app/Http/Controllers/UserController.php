<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use App\Models\Place;
use App\Http\Resources\UserResource;
use App\Http\Resources\PlaceResource;
use App\Services\UserService;

class UserController extends Controller
{
    public $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    public function index()
    {
        $this->authorize('viewAny', User::class);

        $users = $this->userService->all();
        return UserResource::collection($users);
    }
    public function store(StoreUserRequest $request)
    {
        $this->authorize('create', User::class);
        $data = $request->validated();
        
        $user = $this->userService->register($data);
        
        return new UserResource($user);
    }

    public function show(User $user)
    {
        $this->authorize('view', $user);

        return new UserResource($user);
    }

    public function favoritePlaces(User $user)
    {
        $this->authorize('view', $user);

        $places = $this->userService->getFavPlaces($user);
        return PlaceResource::collection($places);
    }
    
    public function addPlace(User $user, Place $place)
    {
        $this->authorize('update', $user);

        $place = $this->userService->addPlaceToUser($place, $user);
        $response = $place instanceof Place ? new PlaceResource($place) : $place;

        return $response;
    }
    public function removePlace(User $user, Place $place)
    {
        $this->authorize('update', $user);

        $place = $this->userService->removePlaceFromUser($place, $user);
        $response = $place instanceof Place ? new PlaceResource($place) : $place;

        return $response;
    }
}
