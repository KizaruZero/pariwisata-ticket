<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Region extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description'];

    public function destinations()
    {
        return $this->hasMany(Destination::class);
    }
}
