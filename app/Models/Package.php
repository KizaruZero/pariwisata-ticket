<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Package extends Model
{
    protected $fillable = ['name', 'deskripsi', 'package_type', 'group_size'];

    public function packagePricings()
    {
        return $this->hasMany(PackagePricing::class);
    }
}
 ?>