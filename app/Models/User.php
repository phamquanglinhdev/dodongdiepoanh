<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

/**
 * @property string $roles
 */
class User extends Authenticatable
{
    use CrudTrait;
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'roles',
        'avatar'
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

    public function setPasswordAttribute($value): void
    {
        if ($value) {
            if ($value != "") {
                $this->attributes['password'] = Hash::make($value);
            }
        }
    }

    public function setAvatarAttribute($value): void
    {
        if ($value) {
            if ($value != "") {
                $this->attributes['avatar'] = $value;
            }
        } else {
            $this->attributes['avatar'] = url("/img/blank.jpg");
        }

    }

    public function permission($permission): int
    {
        $allow = [];
        switch ($permission) {
            case "admin":
                $allow = ["admin"];
                break;
            case "manager":
                $allow = ["admin", "manager"];
                break;
            case "author":
                $allow = ["admin", "manager", "author"];
                break;
            case "collaborator":
                $allow = ["admin", "manager", "author", "collaborator"];
                break;
        }
        return in_array($this->roles, $allow);
    }
}
