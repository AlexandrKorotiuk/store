<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Product extends Model
{
    protected $table = "products";
    protected $primaryKey = "id";
    protected $fillable = [
        'title',
        'price',
        'discription',
        'image',
        'quantity'
    ];

    public function getData()
    {    
        $product = $this->get()->toArray();
        return $product;
    }
}
