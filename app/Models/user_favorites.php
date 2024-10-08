<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_favorites extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'destination_id'];

    public function likedDestinations()
    {
        return $this->belongsToMany(Destination::class, 'user_favorites');
    }
}
