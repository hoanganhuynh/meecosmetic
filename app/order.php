<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    protected $table = 'orders';
    protected $guarded = [''];


    public function getProduct(){
        return $this->belongsTo(Product::class,'pr_id','id');
    }
}
