<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $fillable = ['name', 'description'];

    public function destinations()
    {
        return $this->hasMany(Destination::class);
    }
}
