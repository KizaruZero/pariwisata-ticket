<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Booking extends Model
{
    protected $fillable = ['user_id', 'package_id', 'booking_date', 'number_of_people', 'total_price', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}

 ?>