<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Destination extends Model
{
    protected $fillable = ['name', 'description', 'location', 'category_id', 'region_id', 'image_url', 'rating', 'total_riviews', 'total_orders'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function packagePricings()
    {
        return $this->hasMany(PackagePricing::class);
    }
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function orders()
    {
        return $this->hasManyThrough(Order::class, PackagePricing::class);
    }

    public function updateRating()
    {
        $this->total_reviews = $this->reviews()->count();
        if ($this->total_reviews > 0) {
            $this->rating = $this->reviews()->avg('rating');
        } else {
            $this->rating = 0;
        }
        $this->save();
    }

    public function updatePopularity()
    {
        $this->total_orders = $this->orders()->where('status', 'approved')->count();
        $this->save();
    }
}
?>