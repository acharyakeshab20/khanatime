<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Kyslik\ColumnSortable\Sortable;
use Laravel\Sanctum\HasApiTokens;

class Products extends Model
{
    use HasFactory, HasApiTokens, Notifiable, Sortable;
    protected $table='products';
    protected $fillable=[
        'name',
        'sku',
        'price',
        'discount_price',
        'description',
        'image',
        'category_id',
        'brand_id',
        'status',
        'featured',
    ];

    public $sortable=[
        'name',
        'sku',
        'price',
        'brand_id'
    ];

    protected $casts=[
        'image'=>'array'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function brand(){
        return $this->belongsTo(Brand::class);
    }

    public function thumbnails(): Attribute{
        return Attribute::make(get: fn($value,$attribute)=> json_decode($attribute['image'],true)[0]);
    }

    public function orders(){
        $this->belongsTo(orders::class);
    }
}
