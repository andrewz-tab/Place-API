<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\BelongsToManyRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'latitude', 'longitude'
    ];
    protected $casts = [
        'latitude' => 'double',
        'longitude' => 'double',
    ];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
    
}
