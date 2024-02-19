<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $primaryKey = 'id';
//    $guarded = can set value
    protected $guarded = [];
    public function productType()
    {
        return $this->belongsTo(ProductType::class,'product_type_id');
    }
}
