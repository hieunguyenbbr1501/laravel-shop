<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    public function brands(){
        return $this->belongsTo('App\Brand', 'brand', 'name');
    }
}
