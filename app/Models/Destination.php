<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Destination extends Model
{
    protected $fillable = ['name', 'description', 'location', 'category_id', 'region_id', 'image_url', 'rating', 'popularity'];

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
}
 ?>