<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'destination_id',
        'package_id',
        'total_price',
        'payment_method',
        'status',
        'approved_at',
    ];

    // Relasi dengan tabel User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi dengan tabel Destination
    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }

    // Relasi dengan tabel Package
    public function packagePricing()
    {
        return $this->belongsTo(PackagePricing::class);
    }
}


?>