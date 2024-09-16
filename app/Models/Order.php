<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'package_pricing_id',  // Mengganti package_id dan destination_id
        'total_price', // nanti di ambil dari harga paket track lewat package_pricing_id
        'payment_method',
        'status',
        'approved_at',
    ];

    // Relasi dengan tabel User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi dengan tabel PackagePricing
    public function packagePricing()
    {
        return $this->belongsTo(PackagePricing::class);
    }

    // Relasi untuk mendapatkan informasi Package
    public function package()
    {
        return $this->hasOneThrough(Package::class, PackagePricing::class, 'id', 'id', 'package_pricing_id', 'package_id');
    }

    // Relasi untuk mendapatkan informasi Destination
    public function destination()
    {
        return $this->hasOneThrough(Destination::class, PackagePricing::class, 'id', 'id', 'package_pricing_id', 'destination_id');
    }


}
