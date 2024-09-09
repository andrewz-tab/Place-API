<?php

namespace App\Services;

use App\Models\User;
use App\Models\Place;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function all()
    {
        return User::all();
    }
    public function register($data)
    {
        $user = User::create([
            'login' => $data['login'],
            'role' => isset($data['role']) ? $data['role'] : 'user',
            'password' => Hash::make($data['password']),
        ]);
        return $user;
    }
    public function getFavPlaces($user)
    {
        return $user->places;
    }
    public function addPlaceToUser(Place $place, $user)
    {
        if ($user->places()->count() >= 3){
            return response()->json([
                'code' => 422,
                'message' => 'No more items can be added',
            ], 422);
        }else if(!$user->places()->where('place_id', $place->id)->exists()){
            $user->places()->attach($place->id);
        }
        else{
            return response()->json([
                'code' => 422,
                'message' => 'This item has already been added',
            ], 422);
        }
        return $place;
    }

    public function removePlaceFromUser(Place $place, $user)
    {
        if($user->places()->where('place_id', $place->id)->exists()){
            $user->places()->detach($place->id);
        }else{
            return response()->json([
                'code' => 422,
                'message' => 'This item is not included in the list',
            ], 422);
        }
        return $place;
    }
}
