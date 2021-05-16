<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class transaction extends Model
{
    protected $table = 'transactions';
    protected $guarded = [''];




    public function order () {
        return $this->hasMany('app\order');
    }

    public function getUser(){
        return $this->belongsTo(User::class,'u_id','id');
    }
}
