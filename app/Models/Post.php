<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'image_url',
        'destination_id',
        'author_id',
        'is_published',
        'published_at',
    ];

    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class);
    }


}
