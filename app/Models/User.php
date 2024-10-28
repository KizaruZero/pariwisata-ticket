<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use App\Models\Destination;
use Auth;



class User extends Authenticatable implements FilamentUser
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role', // Add 'role' to fillable attributes
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function canAccessPanel(Panel $panel): bool
    {
        $userRole = Auth::user()->role;
        return $panel->getId() === $userRole;
    }

    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    public function likedDestinations()
    {
        return $this->belongsToMany(Destination::class, 'user_favorites');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function articles()
    {
        return $this->hasMany(Post::class);
    }

    public function getRecommendedDestinations($limit = 5)
    {
        // Mendapatkan ID destinasi yang disukai oleh pengguna
        $likedDestinationIds = $this->likedDestinations()->pluck('destination_id')->toArray();

        // Mendapatkan ID destinasi dari pesanan pengguna yang disetujui
        $orderedDestinationIds = $this->orders()
            ->where('status', 'approved')
            ->with('destination') // Eager load relasi 'destination' dari orders
            ->get()
            ->pluck('destination_id') // Ambil destination_id dari relasi
            ->toArray();

        // Gabungkan ID dari likes dan orders
        $allDestinationIds = array_merge($likedDestinationIds, $orderedDestinationIds);

        // Jika pengguna belum memiliki likes atau orders, tampilkan destinasi terpopuler
        if (empty($allDestinationIds)) {
            return Destination::orderBy('popularity', 'desc')
                ->limit($limit)
                ->get();
        }

        // Mengambil destinasi yang disukai atau diorder oleh pengguna lain yang mirip
        $recommendedDestinations = Destination::whereIn('id', function ($query) use ($allDestinationIds) {
            $query->select('destination_id')
                ->from('user_favorites')
                ->whereIn('user_id', function ($subQuery) use ($allDestinationIds) {
                    $subQuery->select('user_id')
                        ->from('user_favorites')
                        ->whereIn('destination_id', $allDestinationIds);
                });
        })
            ->orWhereIn('id', function ($query) use ($allDestinationIds) {
                $query->select('destination_id')
                    ->from('orders')
                    ->whereIn('user_id', function ($subSubQuery) use ($allDestinationIds) {
                        $subSubQuery->select('user_id')
                            ->from('orders')
                            ->whereIn('destination_id', $allDestinationIds)
                            ->where('status', 'approved'); // Hanya pesanan yang disetujui
                    });
            })
            ->whereNotIn('id', $allDestinationIds) // Hindari rekomendasi yang sudah diorder/disukai
            ->orderBy('popularity', 'desc') // Urutkan berdasarkan popularitas
            ->limit($limit)
            ->get();

        return $recommendedDestinations;
    }









}


?>