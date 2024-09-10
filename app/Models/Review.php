<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Review extends Model
{
    protected $fillable = ['user_id', 'destination_id', 'rating', 'review_text'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }

    // User.php
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }


}
?>