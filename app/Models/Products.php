<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Products extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = [
        'name',
        'description',
        'price',
        'category_id',
        'shop_id',
        'image',
    ];

    public function shops()
    {
        return $this->belongsToMany(Shops::class, 'product_shop', 'product_id', 'shop_id');
    } 
}
