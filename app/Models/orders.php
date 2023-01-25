<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class orders extends Model
{
    use HasFactory, HasApiTokens, Notifiable, SoftDeletes;
    protected $table ='orders';
//    $orders->restore();
    protected $fillable=[
        'sku','name','qty','rate','address'
    ];

    public function product(){
        $this->hasMany(Products::class);
    }
}
