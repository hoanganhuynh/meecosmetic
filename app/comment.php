<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    protected $table = 'comments';
    protected $guarded = [''];


    public function order () {
        return $this->belongsTo('App\order');
    }

    public function user () {
        return $this->belongsTo('App\User');
    }
    public function getUserComment(){
        return $this->belongsTo(User::class,'u_id','id');
    }
    public function getProductComment(){
        return $this->belongsTo(product::class,'pr_id','id');
    }
}
