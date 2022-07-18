<?php

namespace App\Models;

use App\Scopes\ActiveScope;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
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


    // Global Scope
    protected static function booted()
    {
//        static::addGlobalScope('active',function (Builder $builder){
//            $builder->where('status','active');
//        });

        static::addGlobalScope(new ActiveScope());
    }


    public function scopeActive($query){
        return $query->where('status', 'active');
    }

    public function profile()
    {
        return $this->hasOne(UserProfile::class, 'user_id', 'id')->withDefault();
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function hasAbilities($ability)
    {
        foreach ($this->roles as $role) {
            if (in_array($ability, $role->abilities)) {
                return true;
            }
        }
    }
}
