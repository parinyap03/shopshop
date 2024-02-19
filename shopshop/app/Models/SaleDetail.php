<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleDetail extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'sale_details';
    protected $guarded  =[];

    public function product(){
        return $this->belongsTo(Product::class,'product_id');
    }

    public function sale(){
        return $this->belongsTo(User::class,'sale_id');
    }

}
