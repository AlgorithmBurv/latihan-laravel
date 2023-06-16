<?php

namespace App\Models;
// use Illuminate\Contracts\Auth\Authenticatable;
// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = [
        'name', 'email', 'role_id', 'password'
    ];
    
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id', 'id');
    }
    
}




