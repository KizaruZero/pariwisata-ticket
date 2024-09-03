<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class PackagePricing extends Model
{
    protected $fillable = ['package_id', 'destination_id', 'price'];

    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }
}
?>