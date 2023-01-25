<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Kyslik\ColumnSortable\Sortable;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Authenticatable
{
    use HasFactory,Notifiable, HasApiTokens, Sortable;
    protected $table='admins';
    protected $fillable=[
        'name',
        'email',
        'password',
        'phone',
        'address',
        'status',
        'age'
    ];

    public $sortable=[
        'name',
        'email',
        'address'
    ];

    protected $hidden=[
        'password',
        'remember_token'
    ];

    protected $casts=[
        'email_verified_at'=>'datetime'
    ];

    protected function password(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => Hash::make($value),
        );
    }

    protected function name(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => ucfirst($value),
        );
    }
}
