<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;


class User extends Authenticatable{
    use HasApiTokens, HasFactory, Notifiable;
    use HasRoles;
    
    protected $fillable = [
        'name',
        'surname',
        'email',
        'password'
    ];

    public function post(){
        return $this->hasMany(Post::class);
    }

    public function category(){
        return $this->hasMany(Category::class);
    }

    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
