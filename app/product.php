<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $table = 'products';
    protected $guarded = [''];


    public function brand () {
        return $this->belongsTo('App\brand');
    }

    // public function type_product() {
    //     return $this->belongsTo('app\type_product');
    // }

    public function comment () {
        return $this->hasMany(comment::class,'pr_id');
    }

    // public function order () {
    //     return $this->hasMany('app\order');
    // }

    public function relation_store()
    {
        return $this->belongsTo(brand::class,'br_id');
    }

    public function get_tproduct()
    {
        return $this->belongsTo(type_product::class,'tp_id');
    }
}
