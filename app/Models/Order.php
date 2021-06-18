<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['email', 'customer', 'telephone', 'address', 'status_id'];

    public function products(){
        return $this->belongsToMany(Product::class, 'order_products', 'product_id', 'order_id');
    }
}
