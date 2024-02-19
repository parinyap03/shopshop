<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'sales';
    protected $guarded  =[];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

}
