<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class type_product extends Model
{
    protected $table = 'type_products';
    protected $guarded = [''];


    public function product() {
        return $this->hasMany('app\product');
    }

    public function brand_type_product () {
        return $this->hasMany('App\brand_type_product');
    }

    public function get_product()
    {
        return $this->hasMany(product::class, 'tp_id','id');
    }

    // public function get_tp_brand()
    // {
    //     return $this->hasMany(brand_type_product::class, 'tp_id','id');
    // }


}
