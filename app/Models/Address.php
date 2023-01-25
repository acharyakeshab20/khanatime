<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Address extends Model
{
    use HasFactory, HasApiTokens, Notifiable;
    protected $table='locations';
    protected $fillable=[
        'name',
        'city',
        'state',
        'ward',
        'zipcode'
    ];

    public function worker(){
        return $this->hasMany(Worker::class);
    }
}
