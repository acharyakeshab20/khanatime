<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Category extends Model
{
    use HasFactory, HasApiTokens, Notifiable;
    protected $table='categories';
    protected $fillable=[
        'name',
        'status'
    ];

    public function product(){
        return $this->hasMany(Category::class);
    }
}
