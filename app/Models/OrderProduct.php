<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    protected $table = "order_products";
    protected $primaryKey = "id";
    protected $fillable = [
        'product_id',
        'count'
    ];
}

