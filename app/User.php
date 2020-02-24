<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $token
 */
class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'token'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class);
    }

    public function hasPermission(Permission $permission): bool
    {
        $roles = $permission->roles()->get();
        if ($roles->count()) {
            return !!$roles->intersect($this->roles()->get())->count();
        }

        return false;
    }

    public function hasSuperUser(): bool
    {
        $roles = $this->roles()->get();
        if ($roles->count()) {
            return $roles->contains('name', 'administrador');
        }

        return false;
    }

    public function company(): HasOne
    {
        return $this->hasOne(Company::class);
    }

    public function customers(): HasMany
    {
        return $this->hasMany(Customer::class);
    }
}
