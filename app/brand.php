<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class brand extends Model
{
    public $table = 'brand';
    public $guarded = [''];


    public function product () {
        return $this->hasMany('App\product');
    }



    public function get_brands()
    {
        return $this->hasMany(product::class, 'br_id','id');
    }

    public function get_tproduct(){
        return $this->hasMany(type_product::class, 'tp_id', 'id');
    }


}
