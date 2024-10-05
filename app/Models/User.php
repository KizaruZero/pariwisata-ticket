<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
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
        // Replace this with your actual logic to determine if a user is an admin


        // For example, you might check a column in the database:
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

}


?>