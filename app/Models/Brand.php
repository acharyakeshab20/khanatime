<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Brand extends Model
{
    use HasFactory, HasApiTokens, Notifiable;

    protected $table='brands';
    protected $fillable=[
        'name',
        'status',
    ];

    public function product(){
        return $this->hasMany(Products::class);
    }
}
